<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class affiliateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('market');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "referral" =>"required|url|max:300",
            "tag"=>"required|min:15|max:200|regex:/^[a-zA-Z0-9-_]+$/"
        ];
    }
    public function messages(){
        return[
            "referral.required" =>"رابط الأحالة يجب أدخالة",
            "referral.url"      =>"يجب أن تكون الأحالة لرابط لنفس الموقع",
            "referral.max"      =>"رابط الأحالة طويل جدا",


            "tag.required"      =>"رابط التسويق مطلوب",
            "tag.regex"      =>"رابط التسويق يسمح فقط بألاحرف و الأرقام و - أو _ ",
            "tag.min"      =>"رابط التسويق قصير جدا",
            "tag.max"      =>"رابط التسويق طويل جدا",
        ];
    }
}
