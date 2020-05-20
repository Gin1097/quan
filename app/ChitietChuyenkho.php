<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietChuyenkho extends Model
{
    public    $timestamps   = false;

    protected $table        = 'chitiet_chuyenkho';
    protected $fillable     = ['ctck_soLuong', 'ctck_donGia', 'khocu_ma', 'khomoi_ma'];
    protected $guarded      = ['ck_ma', 'sp_ma'];

    protected $primaryKey   = ['ck_ma', 'sp_ma'];
    public    $incrementing = false;
    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
    public function khocu()
    {
        return $this->belongsTo('App\Kho', 'khocu_ma', 'kho_ma');
    }
    public function khomoi()
    {
        return $this->belongsTo('App\Kho', 'khomoi_ma', 'kho_ma');
    }
}
