<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donvitinh extends Model
{
    const     CREATED_AT    = 'dvt_taoMoi';
    const     UPDATED_AT    = 'dvt_capNhat';

    protected $table        = 'donvitinh';
    protected $fillable     = ['dvt_ten', 'dvt_taoMoi', 'dvt_capNhat', 'dvt_trangThai'];
    protected $guarded      = ['dvt_ma'];

    protected $primaryKey   = 'dvt_ma';

    protected $dates        = ['dvt_taoMoi', 'dvt_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
