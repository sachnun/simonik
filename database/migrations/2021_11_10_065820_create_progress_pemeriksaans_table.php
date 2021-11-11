<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressPemeriksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // buat table progress_pemeriksaans dengan kolom prosedur_pengujian string uniq, type set(checkbox,file), posisi int, nilai_bobot int
        Schema::create('progress_pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->string('prosedur_pengujian')->unique();
            $table->set('type', ['checkbox', 'file']);
            $table->integer('posisi');
            $table->integer('nilai_bobot');
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
        Schema::dropIfExists('progress_pemeriksaans');
    }
}
