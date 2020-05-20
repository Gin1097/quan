<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToanCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'tt_ten' => 'required|min:3|max:50|unique:thanhtoan', //tên table vanchuyen
            'tt_dienGiai' => 'required|min:3|max:100',
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
            'tt_ten.required' => 'Tên thanh toán bắt buộc nhập',
            'tt_ten.min' => 'Tên thanh toán ít nhất phải 3 ký tự trở lên',
            'tt_ten.max' => 'Tên thanh toán tối đa chỉ 50 ký tự',
            'tt_ten.unique' => 'Tên thanh toán này đã tồn tại. Vui lòng nhập tên thanh toán khác',

            'tt_dienGiai.required' => 'Diễn giải đề bắt buộc nhập',
            'tt_dienGiai.min' => 'Diễn giải ít nhất phải 3 ký tự trở lên',
            'tt_dienGiai.max' => 'Diễn giải tối đa chỉ 50 ký tự',
        ];
    }
}
