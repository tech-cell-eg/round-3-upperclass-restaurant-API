<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGetInTouchRequest extends FormRequest
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
            'name' => 'string|max:50',
            'email' => 'email',
            'message' => 'string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.max' => 'Your name must not exceed 50 characters.',
            'email.email' => 'The email must be a valid email address.',
            'message.max' => 'The message must not exceed 255 characters.',
        ];
    }
}
