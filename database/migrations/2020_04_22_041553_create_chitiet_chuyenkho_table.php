<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietChuyenkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_chuyenkho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('ck_ma')->comment('chuyển kho mã');
            $table->unsignedBigInteger('sp_ma')->comment('Sản phẩm # sp_ma # sp_ten # Mã sản phẩm');
            $table->unsignedSmallInteger('ctck_soLuong')->default('1')->comment('Số lượng # Số lượng cần chuyến đến kho mới');
            $table->decimal('ctck_thanhtien', 10,2)->comment('Thành tiền # Tổng tiền');  
            $table->unsignedTinyInteger('khocu_ma')->comment('Kho cũ # Kho # kho_ma');
            $table->unsignedTinyInteger('khomoi_ma')->comment('Kho mới # Kho # kh_ma');             
            
            $table->primary(['ck_ma', 'sp_ma']); 
            
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ck_ma')->references('ck_ma')->on('chuyenkho')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('khocu_ma')->references('kho_ma')->on('kho')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('khomoi_ma')->references('kho_ma')->on('kho')->onDelete('CASCADE')->onUpdate('CASCADE');
                       
        });
        DB::statement("ALTER TABLE `chitiet_chuyenkho` comment 'Chi tiết chuyển kho # Chi tiết chuyển kho'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chitiet_chuyenkho');
    }
}