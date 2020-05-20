<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChudeSanpham extends Model {
    public    $timestamps   = false;

    protected $table        = 'chude_sanpham';
    protected $fillable     = [];
    protected $guarded      = ['sp_ma', 'cd_ma'];

    protected $primaryKey   = ['sp_ma', 'cd_ma'];
    public    $incrementing = false;

    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
    public function chude()
    {
        return $this->belongsTo('App\ChuDe', 'cd_ma', 'cd_ma');
    }
}