<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauSanpham extends Model {
    public    $timestamps   = false;

    protected $table        = 'mau_sanpham';
    protected $fillable     = ['msp_soluong'];
    protected $guarded      = ['sp_ma', 'm_ma'];

    protected $primaryKey   = ['sp_ma', 'm_ma'];
    public    $incrementing = false;

    public function mausanpham()
    {
        return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
    public function mau()
    {
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');
    }
}