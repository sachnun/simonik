<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // buat table pemeriksaan dengan kolom npwp, nama_wp, nomor_sp2, nomor_sp2_perubahan, nomor_nd_perpanjangan nullable, tanggal_sp2 date, tanggal_sp2_perubahan date, tanggal_penyampaian_sp2 date, tanggal_jatuh_tempo_sp2 date,kode_pemeriksaan, kriteria_pemeriksaan set(rutin, khusus, tujuan_lain), nilai_potensi int, ketua_tim retasi, anggota_1, anggota_2, anggota_3, masa_pajak_start date, masa_pajak_end date
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('npwp');
            $table->string('nama_wp')->unique();
            $table->string('nomor_sp2');
            $table->string('nomor_sp2_perubahan');
            $table->string('nomor_nd_perpanjangan')->nullable();
            $table->date('tanggal_sp2');
            $table->date('tanggal_sp2_perubahan');
            $table->date('tanggal_penyampaian_sp2');
            $table->date('tanggal_jatuh_tempo_sp2');
            $table->string('kode_pemeriksaan');
            $table->string('kriteria_pemeriksaan');
            $table->integer('nilai_potensi');
            $table->string('ketua_tim');
            $table->string('anggota_1');
            $table->string('anggota_2');
            $table->string('anggota_3');
            $table->date('masa_pajak_start');
            $table->date('masa_pajak_end');
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
        Schema::dropIfExists('pemeriksaans');
    }
}
