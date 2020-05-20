<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xuatkho extends Model
{
    const     CREATED_AT    = 'xk_taoMoi';
    const     UPDATED_AT    = 'xk_capNhat';

    protected $table        = 'xuatkho';
    protected $fillable     = ['xk_ten', 'xk_ngaylap', 'xk_diachi', 'xk_lydo', 'xk_tongtien', 'xk_taoMoi', 'xk_capNhat', 'nv_ma'];
    protected $guarded      = ['xk_ma'];

    protected $primaryKey   = 'xk_ma';

    protected $dates        = ['xk_taoMoi', 'xk_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhanvien()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_ma', 'nv_ma');
    }
}
