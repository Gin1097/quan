<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietNhapkho extends Model
{
    public    $timestamps   = false;

    protected $table        = 'chitietNhapkho';
    protected $fillable     = ['ctnk_soluong', 'ctnk_thanhtien'];
    protected $guarded      = ['nk_ma', 'sp_ma'];

    protected $primaryKey   = ['nk_ma', 'sp_ma'];
    public    $incrementing = false;
}
