<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanphamkho extends Model
{
    const     CREATED_AT    = 'spk_taoMoi';
    const     UPDATED_AT    = 'spk_capNhat';

    protected $table        = 'sanphamkho';
    protected $fillable     = ['spk_taoMoi', 'spk_capNhat', 'sl_nhap', 'sl_xuat', 'sl_ton'];
    protected $guarded      = ['kho_ma', 'sp_ma'];

    protected $primaryKey   = ['kho_ma', 'sp_ma'];
    public    $incrementing = false;
    // protected $dates        = ['spk_taoMoi', 'spk_capNhat'];
    // protected $dateFormat   = 'Y-m-d H:i:s';

    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
    public function kho()
    {
        return $this->belongsTo('App\Kho', 'kho_ma', 'kho_ma');
    }
}
