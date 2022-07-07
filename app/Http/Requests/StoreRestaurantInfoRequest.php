<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        //TODO: phone rule

        return [
            'restaurant_name' => 'required|min:2|max:64',
            'restaurant_phone' => 'required',
            'restaurant_address' => 'required|min:1|max:500',
            'restaurant_category_id' => 'required|numeric|exists:restaurant_categories,id',
            'bank_number' => 'required|digits:16|numeric',
            'restaurant_description' => 'required|min:1|max:300',

            'monday_start' => 'required_with:monday_ends|date_format:H:i',
            'monday_ends' => 'required_with:monday_start|date_format:H:i',

            'tuesday_start' => 'required_with:tuesday_ends|date_format:H:i',
            'tuesday_ends' => 'required_with:tuesday_start|date_format:H:i',

            'wednesday_start' => 'required_with:wednesday_ends|date_format:H:i',
            'wednesday_ends' => 'required_with:wednesday_start|date_format:H:i',

            'thursday_start' => 'required_with:thursday_ends|date_format:H:i',
            'thursday_ends' => 'required_with:thursday_start|date_format:H:i',

            'friday_start' => 'required_with:friday_ends|date_format:H:i',
            'friday_ends' => 'required_with:friday_start|date_format:H:i',

            'saturday_start' => 'required_with:saturday_ends|date_format:H:i',
            'saturday_ends' => 'required_with:saturday_start|date_format:H:i',

            'sunday_start' => 'required_with:sunday_ends|date_format:H:i',
            'sunday_ends' => 'required_with:sunday_start|date_format:H:i',
        ];
    }
}
