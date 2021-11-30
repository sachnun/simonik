<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKetetapanPajaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // buat tabel surat_ketetapan_pajaks dengan kolom npwp, nama_wp uniq, nomor_skp, nomor_lhp, tanggal_skp, tanggal_lhp, nominal_terbit, nominal_disetujui
        Schema::create('surat_ketetapan_pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('npwp');
            $table->string('nama_wp');
            $table->string('nomor_skp');
            $table->string('nomor_lhp');
            $table->date('tanggal_skp');
            $table->date('tanggal_lhp');
            $table->bigInteger('nominal_terbit');
            $table->bigInteger('nominal_disetujui');
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
        Schema::dropIfExists('surat_ketetapan_pajaks');
    }
}
