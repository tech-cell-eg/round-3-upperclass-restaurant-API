<?php

namespace App\Http\Requests\Api\Table;

use App\Http\Requests\Api\Base\ApiRequest;

class CreateTableRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'guest_number' => 'required|integer',
            'date' => [
                'required',
                'date_format:d/m/Y',
                'after_or_equal:' . now()->format('d/m/Y'),
            ],
            'time' => 'required',
        ];
    }
}
