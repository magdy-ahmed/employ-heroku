<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class categoryRequest extends FormRequest
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

            "name"=>"required|unique:categories"

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'أسم الوظيفة يجب أدخالة',
            'name.unique' => 'لا يمكن أدخال وظيفتين بنفس الأسم',
        ];
    }
}
