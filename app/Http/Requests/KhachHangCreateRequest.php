<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangCreateRequest extends FormRequest
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
            'kh_taiKhoan' => 'required|min:3|max:50', //tên table cusc_chude
            'kh_matKhau' => 'required|min:6|max:10',
            'kh_hoTen' => 'required|min:3|max:10',
            'kh_email' => 'required|min:8|max:100',
            'kh_ngaySinh' => 'required|min:8|max:10',
            'kh_diaChi' => 'required|min:10|max:100',
            'kh_dienThoai' => 'required|min:10|max:11'

        ];
    }

    public function messages() 
    {
        return [
            'kh_taiKhoan.required' => 'Tên tài khoản bắt buộc nhập',
            'kh_taiKhoan.min' => 'Tên tài khoản ít nhất phải 3 ký tự trở lên',
            'kh_taiKhoan.max' => 'Tên tài khoản tối đa chỉ 50 ký tự',

            'kh_matKhau.required' => 'Mật khẩu bắt buộc nhập',
            'kh_matKhau.min' => 'Mật khẩu ít nhất phải 6 ký tự trở lên',
            'kh_matKhau.max' => 'Mật khẩu tối đa chỉ 10 ký tự',

            'kh_hoTen.required' => 'Họ tên bắt buộc nhập',
            'kh_hoTen.min' => 'Họ tên ít nhất phải 3 ký tự trở lên',
            'kh_hoTen.max' => 'Họ tên tối đa chỉ 10 ký tự',

            'kh_email.required' => 'Email bắt buộc nhập',
            'kh_email.min' => 'Email ít nhất phải 8 ký tự trở lên',
            'kh_email.max' => 'Email tối đa chỉ 100 ký tự',

            'kh_ngaySinh.required' => 'Ngày sinh bắt buộc nhập',
            'kh_ngaySinh.min' => 'Ngày sinh ít nhất phải 8 ký tự trở lên',
            'kh_ngaySinh.max' => 'Ngày sinh tối đa chỉ 10 ký tự',

            'kh_diaChi.required' => 'Địa chỉ bắt buộc nhập',
            'kh_diaChi.min' => 'Địa chỉ ít nhất phải 10 ký tự trở lên',
            'kh_diaChi.max' => 'Địa chỉ tối đa chỉ 100 ký tự',

            'kh_dienThoai.required' => 'SDT bắt buộc nhập',
            'kh_dienThoai.min' => 'SDT có độ dài từ 10-11 ký tự',
            'kh_dienThoai.max' => 'SDT có độ dài từ 10-11 ký tự',
        
        ];
    }
}
