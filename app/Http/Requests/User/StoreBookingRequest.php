<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'passenger_name' => ['required', 'max:255'],
            'passenger_phone' => ['required', 'max:20'],
            'pickup_time' => ['required', 'date', 'after:now'],
            'num_passengers' => ['required', 'integer', 'min:1', 'max:20'],
            'note' => ['nullable', 'max:1000'],
            'transfer_route_id' => ['required', 'exists:transfer_routes,id'],
        ];
    }
}
