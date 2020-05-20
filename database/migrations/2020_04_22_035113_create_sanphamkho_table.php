<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphamkho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('kho_ma')->comment('Mã kho');
            $table->unsignedBigInteger('sp_ma')->comment('Sản phẩm # sp_ma # sp_ten # Mã sản phẩm');
            $table->timestamp('spk_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm kho');
            $table->timestamp('spk_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm kho gần nhất');
            $table->primary(['kho_ma', 'sp_ma']);
            $table->foreign('kho_ma')->references('kho_ma')->on('kho')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('sl_nhap');
            $table->integer('sl_xuat');
            $table->integer('sl_ton');
        });
        DB::statement("ALTER TABLE `sanphamkho` comment 'Sản phẩm kho # Sản phẩm kho'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sanphamkho');
    }
}
