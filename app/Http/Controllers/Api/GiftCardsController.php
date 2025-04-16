<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GiftCardResource;
use App\Models\GiftCard;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class GiftCardsController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->successResponse(
            GiftCardResource::collection(GiftCard::all()),
            'Fetched Gift Cards'
        );
    }

    public function show(GiftCard $giftCard)
    {
        return $this->successResponse(
            new GiftCardResource($giftCard->load('details')),
            'Fetched Gift Card'
        );
    }
}
