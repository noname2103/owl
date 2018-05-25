<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaivietthanhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baivietthanhvien', function (Blueprint $table) {
            $table->increments('mabaiviet');
            $table->string('tieude');
            $table->datetime('ngaygio');
            $table->text('noidung');
            $table->integer('mathumuc')->unsigned();
            $table->foreign('mathumuc')->references('mathumuc')->on('thumuc');
            $table->integer('mathanhvien')->unsigned();
            $table->foreign('mathanhvien')->references('mathanhvien')->on('thanhvien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baivietthanhvien');
    }
}
