<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class settingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('manage');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "affiliate-expire"=>"required|numeric",
            "afilite-amount-1"=>"required|numeric",
            "afilite-amount-2"=>"required|numeric",
            "afilite-amount-3"=>"required|numeric",
            "afilite-rate-1"=>"required|numeric",
            "afilite-rate-2"=>"required|numeric",
            "afilite-rate-3"=>"required|numeric",
            "afilite-rate-4"=>"required|numeric",
            "afilite-count-users"=>"required|numeric",
            "special-ads-days"=>"required|numeric",
            "renewAuto-ads-days"=>"required|numeric",
            "renewAuto-ads-hours"=>"required|numeric",
            "renewAuto-ads-amount"=>"required|numeric",
            "afilite-remove-user"=>"required|numeric"
        ];
    }
}
