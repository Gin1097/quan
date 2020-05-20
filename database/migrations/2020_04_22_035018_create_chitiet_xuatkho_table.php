<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietXuatkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_xuatkho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma')->comment('mã sản phẩm # sp_ma # m_ten # Mã sản phẩm');
            $table->unsignedTinyInteger('xk_ma')->comment('xuất kho # xk_ma # xk_ten # Mã xuất kho');
            $table->unsignedSmallInteger('ctxk_soluong')->default('0')->comment('Số lượng # Số lượng sản phẩm tương ứng với màu');
            
            $table->primary(['sp_ma', 'xk_ma']);
            $table->foreign('xk_ma')->references('xk_ma')->on('xuatkho')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `chitiet_xuatkho` comment 'Chi tiết xuất kho # Chi tiết xuất kho'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chitiet_xuatkho');
    }
}
