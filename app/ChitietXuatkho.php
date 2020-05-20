<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietXuatkho extends Model
{
    public    $timestamps   = false;

    protected $table        = 'chitiet_xuatkho';
    protected $fillable     = ['ctxk_soluong'];
    protected $guarded      = ['xk_ma', 'sp_ma'];

    protected $primaryKey   = ['xk_ma', 'sp_ma'];
    public    $incrementing = false;

    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
}
