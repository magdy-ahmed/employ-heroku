<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class serviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth::user()->can('sell');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           "title"=> "required|max:50|min:4",
           "content"=>"required|min:15",
           "excerpt"=>"required|max:200|min:15",
           "salery"=>"required|max:11",
           "discount"=>"max:4",
           "place"=>"required"
        ];

    }
    public function messages(){
        return [
            "title.required"=>"عنوان الخدمة يجب أدخاله",
            "title.min"=>"العنوان قصير فهو يكون من 4 أحرف ل 50 حرف",
            "title.required"=>"العنوان الخدمة طويل فهو يكون من 4 أحرف ل 50 حرف",

            "content.required"=>"الوصف  للخدمة يجب أدخاله",
            "content.min"=>"الوصف قصير فهو يكون  أكبر من 15 حرف ",

            "excerpt.required"=>"الوصف المختصر للخدمة يجب أدخاله",
            "excerpt.min"=>"الوصف  المختصر قصير فهو يكون من 15 حرف ل 200 حرف",
            "excerpt.max"=>"الوصف  المختصر طويل فهو يكون من 15 حرف ل 200 حرف",

            "salery.required"=>"السعر  للخدمة يجب أدخاله",

            "salery.max"=>"السعر  للخدمة طويل",
            "discount.max"=>"الخصم  للخدمة طويل",

            "place.required"=>"يجب أختيار المنشئة مقدمة الخدمة",
        ];
    }
}
