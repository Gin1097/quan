<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuyenkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyenkho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('ck_ma')->autoIncrement()->comment('Mã chuyển kho');
            $table->datetime('ck_ngay')->comment('Ngày chuyển kho # Ngày chuyển kho');
            $table->string('ck_lydo', 200)->comment('Lý do chuyển kho');
            $table->unsignedSmallInteger('nv_ma')->comment('Mã nhân viên chuyển kho');
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
    });
    DB::statement("ALTER TABLE `chuyenkho` comment 'Chuyển kho # Chuyển kho'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chuyenkho');
    }
}
