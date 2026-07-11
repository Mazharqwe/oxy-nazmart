<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id'      => 'required|integer',
            'product_slug'    => 'nullable|string',
            'quantity'        => 'required|integer|min:1',
            'product_variant' => 'nullable|integer', // ProductInventoryDetail id (resolved from the selected variation)
            'selected_color'  => 'nullable',
            'selected_size'   => 'nullable',

            'name'            => 'required|string|max:191',
            'phone'          => 'required|string|max:40',
            'state'           => 'nullable|integer',       // CountryManage State id (field hidden when no states exist)
            'city'            => 'required|integer',       // CountryManage City id
            'address'         => 'required|string|max:500',

            // Optional account creation
            'create_account'  => 'nullable',
            'email'           => 'nullable|email|required_with:create_account',
            'create_username' => 'nullable|string|max:100|required_with:create_account',
            'create_password' => 'nullable|string|min:6|required_with:create_account',
        ];
    }

    public function messages(): array
    {
        return [
            'city.required'    => __('Please select a city'),
            'address.required' => __('Delivery address is required'),
            'phone.required'   => __('Mobile number is required'),
            'name.required'    => __('Full name is required'),
        ];
    }
}
