<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class notificationRequest extends FormRequest
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
            "name"=>"required|min:5|max:50",
            "content"=>"required|min:10|max:500"
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'عنوان الأشعار مطلوب',
            'name.min' => 'عنوان الأشعار أصغر من 5 أحرف',
            'name.max' => 'عنوان الأشعار أكبر من 50 حرف',

            'content.required' => 'محتوى الأشعار مطلوب',
            'name.min' => 'محتوى الأشعار أصغر من 10 أحرف',
            'name.max' => 'محتوى الأشعار أكبر من 500 حرف',
        ];
    }
}
