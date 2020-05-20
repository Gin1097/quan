<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonvitinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvitinh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('dvt_ma')->autoIncrement()->comment('Mã đơn vị tính sản phẩm');
            $table->string('dvt_ten', 50)->comment('Tên đơn vị tính # Tên đơn vị tính sản phẩm');
            $table->timestamp('dvt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo đơn vị tính');
            $table->timestamp('dvt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật đơn vị tính gần nhất');
            $table->tinyInteger('dvt_trangThai')->default('2')->comment('Trạng thái # Trạng thái đơn vị tính sản phẩm: 1-khóa, 2-khả dụng');
            
            $table->unique(['dvt_ten']);
        });
        DB::statement("ALTER TABLE `donvitinh` comment 'Đơn vị tính # Đơn vị tính sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donvitinh');
    }
}
