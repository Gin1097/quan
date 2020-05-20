<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chuyenkho extends Model
{
    public    $timestamps   = false;

    protected $table        = 'chuyenkho';
    protected $fillable     = ['ck_ngay', 'ck_lydo', 'nv_ma'];
    protected $guarded      = ['ck_ma'];

    protected $primaryKey   = 'ck_ma';

    protected $dates        = ['ck_ngay'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhanvien()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_ma', 'nv_ma');
    }
}
