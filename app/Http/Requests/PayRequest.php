<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'plan' => ['bail','required', 'string','exists:plans,name', 'max:255'],
            'firstName' => ['bail','required', 'string', 'max:255'],
            'lastName' => ['bail','required', 'string', 'max:255'],
            'phone' => ['bail','required'],
            'dial_code' => ['bail','required', 'integer'],
            'discount' => ['bail', 'nullable','max:255'],
            'email' => ['bail','required', 'string', 'email', 'max:255'],
            'billing_address' => ['bail','required', 'string', 'max:255'],
            'state' => ['bail', 'required','string', 'max:255'],
            'city' => ['bail','required', 'string', 'max:255'],
            'postal_code' => ['bail','required', 'string', 'max:255'],
            'address_country' => ['bail','required', 'string', 'max:255'],
    
            ];
    }
}
