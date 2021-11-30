<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PemeriksaanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // validasi data npwp, nama_wp, nomor_sp2, nomor_sp2_perubahan, nomor_nd_perpanjangan nullable, tanggal_sp2, tanggal_sp2_perubahan, tanggal_penyampaian_sp2, tanggal_jatuh_tempo_sp2, kode_pemeriksaan, kriteria_pemeriksaan, nilai_potensi int, ketua_tim, anggota_1, anggota_2, anggota_3, masa_pajak_start, masa_pajak_end
        return [
            'npwp' => 'required|max:20',
            'nama_wp' => ['required', Rule::unique('pemeriksaans')->ignore($this->pemeriksaan)],
            'nomor_sp2' => 'required|max:255',
            'nomor_sp2_perubahan' => 'required|max:255',
            'nomor_nd_perpanjangan' => 'nullable|max:255',
            'tanggal_sp2' => 'required|date',
            'tanggal_sp2_perubahan' => 'required|date',
            'tanggal_penyampaian_sp2' => 'required|date',
            'tanggal_jatuh_tempo_sp2' => 'required|date',
            'kode_pemeriksaan' => 'required|max:255',
            'kriteria_pemeriksaan' => 'required|max:255',
            'nilai_potensi' => 'required|integer',
            'ketua_tim' => 'required|max:255',
            'anggota_1' => 'required|max:255',
            'anggota_2' => 'required|max:255',
            'anggota_3' => 'required|max:255',
            'masa_pajak_start' => 'required|date',
            'masa_pajak_end' => 'required|date',
        ];
    }
}
