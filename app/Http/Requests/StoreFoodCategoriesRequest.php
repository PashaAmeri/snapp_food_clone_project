<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodCategoriesRequest extends FormRequest
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

        /**
         * 
         * food category validations: editing and creating
         */
        return [
            'category_name' => 'required|min:2|max:64',
            'category_description' => 'required|min:1|max:150',
        ];
    }
}
