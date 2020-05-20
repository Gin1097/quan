<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhapkho extends Model
{
    
    const     CREATED_AT    = 'nk_taoMoi';
    const     UPDATED_AT    = 'nk_capNhat';

    protected $table        = 'nhapkho';
    protected $fillable     = ['nk_ngaylap', 'nk_lydo', 'nk_tongtien', 'nk_taoMoi', 'nk_capNhat', 'ncc_ma', 'nv_ma'];
    protected $guarded      = ['nk_ma'];

    protected $primaryKey   = 'nk_ma';

    protected $dates        = ['nk_taoMoi', 'nk_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function nhanvien()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_ma', 'nv_ma');
    }
    public function nhacungcap()
    {
        return $this->belongsTo('App\Nhacungcap', 'ncc_ma', 'ncc_ma');
    }
}
