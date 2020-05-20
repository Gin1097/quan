<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MauCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'm_ten' => 'required|min:3|max:50|unique:mau', //tên table 
        ];
    }

    public function messages() 
    {
        return [
            'm_ten.required' => 'Tên màu bắt buộc nhập',
            'm_ten.min' => 'Tên màu ít nhất phải 3 ký tự trở lên',
            'm_ten.max' => 'Tên màu tối đa chỉ 50 ký tự',
            'm_ten.unique' => 'Tên màu này đã tồn tại. Vui lòng nhập tên màu khác'
        ];
    }
}
