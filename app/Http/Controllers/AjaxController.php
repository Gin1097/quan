<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;
use App\Sanphamkho;

class AjaxController extends Controller
{
    //
    public function getSanpham($idSanpham)
    {
        $danhsachsanpham = Sanpham::where('sp_ma', $idSanpham)->get(); 
        foreach($danhsachsanpham as $str)
        {
            echo "<option value='".$str->sp_giaGoc."'>".$str->sp_giaGoc."</option>";
        }    
    }
    public function getKho($idSanpham){
        $danhsachsanpham = Sanpham::where('sp_ma', $idSanpham)->get();
        foreach($danhsachsanpham as $str)
        {
            echo "<option value='".$str->kho_ma."'>".$str->kho_ma."</option>";
        }
    }
    public function getDonvitinh($idSanpham){
        $danhsachsanpham = Sanpham::where('sp_ma', $idSanpham)->get();
        foreach($danhsachsanpham as $str)
        {
            echo "<option value='".$str->dvt_ma."'>".$str->dvt_ma."</option>";
        }
    }
    public function getgiaBan($idSanpham){
        $danhsachsanpham = Sanpham::where('sp_ma', $idSanpham)->get();
        foreach($danhsachsanpham as $str)
        {
            echo "<option calue='".$str->sp_giaBan."'>".$str->sp_giaBan."</option>";
        }
    }
    public function getphieuNhapKho($idSanpham){
        $danhsachsanpham = Sanpham::where('sp_ma', $idSanpham)->get();
        foreach($danhsachsanpham as $str)
        {
            echo "<option calue='".$str->kho_ma."'>".$str->kho_ma."</option>";
        }
    }
    public function getSanphamkho($idSanpham){
        $danhsachsanphamkho = Sanphamkho::where('sp_ma', $idSanpham)->get();
        foreach($danhsachsanphamkho as $str1)
        {
            echo "<option calue='".$str1->sl_ton."'>".$str1->sl_ton."</option>";
        }
    }
    public function getSanphamkho1($idSanpham){
        $danhsachsanphamkho = Sanphamkho::where('sp_ma', $idSanpham)->get();
        foreach($danhsachsanphamkho as $str1)
        {
            echo "<option calue='".$str1->sl_nhap."'>".$str1->sl_nhap."</option>";
        }
    }
    public function getSanphamkho2($idSanpham){
        $danhsachsanphamkho = Sanphamkho::where('sp_ma', $idSanpham)->get();
        foreach($danhsachsanphamkho as $str1)
        {
            echo "<option calue='".$str1->sl_xuat."'>".$str1->sl_xuat."</option>";
        }
    }
}
