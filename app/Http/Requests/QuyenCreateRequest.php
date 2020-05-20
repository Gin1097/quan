<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyenCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'q_ten' => 'required|min:3|max:50|unique:quyen', //tên table vanchuyen
            'q_dienGiai' => 'required|min:3|max:100',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'q_ten.required' => 'Tên quyền bắt buộc nhập',
            'q_ten.min' => 'Tên quyền ít nhất phải 3 ký tự trở lên',
            'q_ten.max' => 'Tên quyền tối đa chỉ 50 ký tự',
            'q_ten.unique' => 'Tên quyền này đã tồn tại. Vui lòng nhập tên quyền khác',

            'q_dienGiai.required' => 'Diễn giải đề bắt buộc nhập',
            'q_dienGiai.min' => 'Diễn giải ít nhất phải 3 ký tự trở lên',
            'q_dienGiai.max' => 'Diễn giải tối đa chỉ 100 ký tự',
        ];
    }
}
