<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VanChuyenCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Tạm thời không phân quyền
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vc_ten' => 'required|min:3|max:50|unique:vanchuyen', //tên table vanchuyen
            'vc_chiPhi' => 'required|max:10',
            'vc_dienGiai' => 'required|min:3|max:50',
        ];
    }

    public function messages() 
    {
        return [
            'vc_ten.required' => 'Tên vận chuyển bắt buộc nhập',
            'vc_ten.min' => 'Tên vận chuyển ít nhất phải 3 ký tự trở lên',
            'vc_ten.max' => 'Tên vận chuyển tối đa chỉ 50 ký tự',
            'vc_ten.unique' => 'Tên vận chuyển này đã tồn tại. Vui lòng nhập tên vận chuyển khác',

            'vc_chiPhi.required' => 'Chi phí bắt buộc nhập',
            'vc_chiPhi.max' => 'Chi phí tối đa chỉ 50 ký tự',

            'vc_dienGiai.required' => 'Diễn giải đề bắt buộc nhập',
            'vc_dienGiai.min' => 'Diễn giải ít nhất phải 3 ký tự trở lên',
            'vc_dienGiai.max' => 'Diễn giải tối đa chỉ 50 ký tự',
        ];
    }
}
