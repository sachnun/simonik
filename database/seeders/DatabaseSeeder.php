<?php

namespace Database\Seeders;

use App\Models\ProgressPemeriksaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User 1
        User::create([
            'nama_depan' => 'Tester',
            'nama_belakang' => 'Internal',
            'nip_sikka' => 'test',
            'role' => 'admin',
            'password' => bcrypt('test'),
        ]);

        // factory surat ketetapan pajak
        \App\Models\SuratKetetapanPajak::factory(100)->create();


        // Checkbox
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Penerbitan SP2',
            'type' => 'checkbox',
            'posisi' => 1,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Penyampaian SPPL/Surat Panggilan Dalam Rangka pemeriksaan
            kantor kepada WP',
            'type' => 'checkbox',
            'posisi' => 2,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Pertemuan dengan Wajib Pajak',
            'type' => 'checkbox',
            'posisi' => 3,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Permintaan IBK',
            'type' => 'checkbox',
            'posisi' => 4,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Pengujian lapangan di tempat wajib pajak',
            'type' => 'checkbox',
            'posisi' => 5,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Penyusunan berita Acara Pemenuhan/tidak Dipenuhinya
            Peminjaman buku, Catatan, dan Dokumen',
            'type' => 'checkbox',
            'posisi' => 6,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Perolehan Data Elektronik',
            'type' => 'checkbox',
            'posisi' => 7,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Pembuatan BAPK',
            'type' => 'checkbox',
            'posisi' => 8,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Permintaan Exchange of information (EoI)',
            'type' => 'checkbox',
            'posisi' => 9,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Penilaian oleh Penilai Pajak',
            'type' => 'checkbox',
            'posisi' => 10,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Pengujian Transfer Pricing',
            'type' => 'checkbox',
            'posisi' => 11,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => '- SPT Lampiran 3A',
            'type' => 'checkbox',
            'posisi' => 12,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => '- Metode Pengujian Transfer Pricing',
            'type' => 'checkbox',
            'posisi' => 13,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'KKP Pengujian',
            'type' => 'checkbox',
            'posisi' => 14,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => '- KKP Peredaran Usaha dan KKP Harga Pokok Penjualan',
            'type' => 'checkbox',
            'posisi' => 15,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => '- KKP Biaya dan KKP PPh Pemotongan/Pemungutan',
            'type' => 'checkbox',
            'posisi' => 16,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => '- KKP PPN dan KKP jenis pajak yang lain',
            'type' => 'checkbox',
            'posisi' => 17,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => '- KKP Induk',
            'type' => 'checkbox',
            'posisi' => 18,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'SPHP disampaikan kepada Wajib Pajak',
            'type' => 'checkbox',
            'posisi' => 19,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => '- Pengungkapan Ketidakbenaran Pengisian SPT',
            'type' => 'checkbox',
            'posisi' => 20,
            'nilai_bobot' => 10,
        ]);

        // File
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Laporan Hasil Pemeriksaan',
            'type' => 'file',
            'posisi' => 21,
            'nilai_bobot' => 10,
        ]);
        ProgressPemeriksaan::create([
            'prosedur_pengujian' => 'Nota Hitung ',
            'type' => 'file',
            'posisi' => 22,
            'nilai_bobot' => 0,
        ]);
    }
}
