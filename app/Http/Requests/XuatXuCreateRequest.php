<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class XuatXuCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'xx_ten' => 'required|min:3|max:50|unique:xuatxu', //tên table
        ];
    }

    public function messages() 
    {
        return [
            'xx_ten.required' => 'Tên xuất xứ bắt buộc nhập',
            'xx_ten.min' => 'Tên xuất xứ ít nhất phải 3 ký tự trở lên',
            'xx_ten.max' => 'Tên xuất xứ tối đa chỉ 50 ký tự',
            'xx_ten.unique' => 'Tên xuất xứ này đã tồn tại. Vui lòng nhập tên xuất xứ khác'
        ];
    }
}
