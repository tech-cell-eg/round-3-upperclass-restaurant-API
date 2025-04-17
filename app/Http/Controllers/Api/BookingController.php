<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Table\CreateTableRequest;
use App\Http\Requests\Api\Table\UnBookTableTableRequest;
use App\Http\Resources\Table\BookingResource;
use App\Models\Booking;
use App\Models\Setting;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    use ApiResponse;

    // Maximum number of tables available per day
    const MAX_TABLES_PER_DAY = 10;

    public function bookTable(CreateTableRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $bookingDate = Carbon::createFromFormat('d/m/Y', $validated['date']);
        $formattedDate = $bookingDate->format('Y-m-d');

        // Check if restaurant is open
        if (!Setting::isOpenAt($formattedDate, $validated['time'])) {
            return $this->errorResponse(
                'Restaurant is closed at the selected date and time',
                422
            );
        }

        // Check table availability for the day
        $bookingsCount = Booking::whereDate('date', $formattedDate)->count();

        if ($bookingsCount >= self::MAX_TABLES_PER_DAY) {
            return $this->errorResponse(
                'No tables available for the selected date. All tables are booked.',
                422
            );
        }

        // Create booking
        $table = Booking::create([
            'name' => $validated['name'],
            // 'booking_id' => rand(100000,999999),
            'booking_id' => $this->generateUniqueBookingId(),
            'guest_number' => $validated['guest_number'],
            'date' => $formattedDate,
            'time' => $validated['time'],
        ]);

        return $this->successResponse(new BookingResource($table), 'Table booked successfully');
    }

    /**
     * Generate a unique 6-digit booking ID
     */
    protected function generateUniqueBookingId(): int
    {
        do {
            $bookingId = random_int(100000, 999999);
        } while (Booking::where('booking_id', $bookingId)->exists());

        return $bookingId;
    }

    public function unBookTable(UnBookTableTableRequest $request)
    {
        $validated = $request->validated();

        // Find and delete the booking
        $table = Booking::where('booking_id', $validated['booking_id'])->delete();

        if ($table) {
            return $this->successResponse(
                null,
                'Booking successfully cancelled',
                200
            );
        }

        return $this->errorResponse(
            'Booking not found or already cancelled',
            404
        );
    }
}
