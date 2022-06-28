<?php

namespace App\Http\Requests;

use App\Rules\Dashboard\Discount\CouponCheckBoxRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
        return [
            'coupon_code' => 'required|min:4|max:32|unique:coupons',
            'coupon_title' => 'required|min:2|max:64',
            'coupon_description' => 'required|min:2|max:300',
            'max_uses' => 'required|numeric|min:1|max:999999999999',
            'max_uses_per_user' => 'required|numeric|min:1|max:999999999999',
            'discount_amount' => 'required|numeric|min:1|max:999999999999',
            'is_percentage' => 'required|in:0,1',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date'
        ];
    }
}
