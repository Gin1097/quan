<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model {
    public    $timestamps   = false;

    protected $table        = 'chitietdonhang';
    protected $fillable     = ['ctdh_soLuong', 'ctdh_donGia'];
    protected $guarded      = ['dh_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['dh_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;
    public function donhangsanpham()
    {
        return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
    public function mau()
    {
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');
    }
}