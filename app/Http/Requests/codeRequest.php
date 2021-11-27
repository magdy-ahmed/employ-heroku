<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class codeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('sell');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "code"=>"required|min:8|max:10"
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'أدخل الكود المكون من 9 أرقام',
            // 'code.numeric' => 'الكود يجب أنم يتكون من 9 أرقام',
            'code.min' => 'الكود يجب أن يتكون من 9 أرقام',
            'code.max' => 'الكود يجب أن يتكون من 9 أرقام',

        ];
    }
}
