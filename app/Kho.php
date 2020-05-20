<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    const     CREATED_AT    = 'kho_taoMoi';
    const     UPDATED_AT    = 'kho_capNhat';

    protected $table        = 'kho';
    protected $fillable     = ['kho_ten', 'kho_diachi', 'kho_sdt', 'kho_quanly', 'kho_dienGiai', 'kho_taoMoi', 'kho_capNhat', 'kho_trangThai'];
    protected $guarded      = ['kho_ma'];

    protected $primaryKey   = 'kho_ma';

    protected $dates        = ['kho_taoMoi', 'kho_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
