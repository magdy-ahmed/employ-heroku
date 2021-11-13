<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class placeRequest extends FormRequest
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
            "name"      =>"required|min:4||max:50",
            "content"   =>"required|min:15",
            "excerpt"   =>"required|max:200|min:15",
            "openAt"    =>"required",
            "closeAt"   =>"required",
            "country"   =>"required",
            "city"      =>"required|min:3||max:50",
            "address"   =>"required|min:10||max:250",
            "status"    =>"required"

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'أسم المنشئة يجب أدخالة',
            'name.min' => 'الأسم قصير من 4 حرف ل 50 حرف',
            'name.max' => 'الأسم طويل من 4 حرف ل 50 حرف',

            "content.required"=>"الوصف  للخدمة يجب أدخاله",
            "content.min"=>"الوصف قصير فهو يكون  أكبر من 15 حرف ",

            'openAt.required' => 'وقت الفتح يجب أختيارة',

            'closeAt.required' => 'وقت الأغلاق يجب أختيارة',

            'country.required' => ' يجب أختيار البلد',

            'city.required' => ' يجب أدخال المدينة',
            'city.min' => 'أسم المدينة قصير فهو من 3 حرف ل 50 حرف',
            'city.max' => 'أسم المدينة طويل فهو من 3 حرف ل 50 حرف',

            'address.required' => 'العنوان يجب أدخالة',
            'address.min' => 'العنوان قصير فهو من 3 حرف ل 250 حرف',
            'address.max' => 'العنوان طويل فهو من 10 حرف ل 250 حرف',

            "excerpt.required"=>"الوصف  للخدمة يجب أدخاله",
            "excerpt.min"=>"الوصف قصير فهو يكون من 15 حرف ل 200 حرف",
            "excerpt.max"=>"الوصف طويل فهو يكون من 15 حرف ل 200 حرف",

            'status.required' => 'يجب أختيار الحالة',
        ];
    }
}
