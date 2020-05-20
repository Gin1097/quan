<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietnhap extends Model {
    public    $timestamps   = false;

    protected $table        = 'chitietnhap';
    protected $fillable     = ['ctn_soLuong', 'ctn_donGia'];
    protected $guarded      = ['pn_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['pn_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;

    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
    public function mau()
    {
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');
    }
}