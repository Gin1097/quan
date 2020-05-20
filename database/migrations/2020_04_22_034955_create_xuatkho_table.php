<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuatkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatkho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('xk_ma')->autoIncrement()->comment('Mã xuất kho');
            $table->date('xk_ngaylap');
            $table->string('xk_diachi');
            $table->string('xk_lydo', 200)->comment('Lý do # Lý do xuất kho');
            $table->decimal('xk_tongtien', 10,2);
            $table->timestamp('xk_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên xuất kho');
            $table->timestamp('xk_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật xuất kho gần nhất');
            $table->unsignedSmallInteger('nv_ma')->comment('Chương trình # nv_ma # Mã nhân viên');

            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `xuatkho` comment 'Xuất kho # Xuất kho'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('xuatkho');
    }
}
