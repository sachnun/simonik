<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // buat table progress dengan kolom relasi dari progress_pemeriksaans, relasi dari pemeriksaans, check bolean, file, tanggal_pelaksanaan date, dan keterangan text
        Schema::create('progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('progress_pemeriksaan_id');
            $table->unsignedBigInteger('pemeriksaan_id');
            $table->boolean('check')->default(false);
            $table->string('file')->nullable();
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('progress_pemeriksaan_id')->references('id')->on('progress_pemeriksaans')->onDelete('cascade');
            $table->foreign('pemeriksaan_id')->references('id')->on('pemeriksaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
