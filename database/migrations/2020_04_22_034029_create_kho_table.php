<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('kho_ma')->autoIncrement()->comment('Mã kho');
            $table->string('kho_ten', 30)->comment('Tên quyền # Tên quyền');
            $table->String('kho_diachi', 200)->comment('địa chỉ # địa chỉ');
            $table->char('kho_sdt', 10)->comment('sdt # số điện thoại kho');
            $table->String('kho_quanly', 100)->comment('quản lý # người quản lý kho');
            $table->string('kho_dienGiai', 250)->comment('Diễn giải # Diễn giải về kho');
            $table->timestamp('kho_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo kho');
            $table->timestamp('kho_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật kho gần nhất');
            $table->tinyInteger('kho_trangThai')->default('2')->comment('Trạng thái # Trạng thái kho: 1-khóa, 2-khả dụng');
            
            $table->unique(['kho_ten']);
        });
        DB::statement("ALTER TABLE `kho` comment 'Kho # Các quyền quản lý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kho');
    }
}
