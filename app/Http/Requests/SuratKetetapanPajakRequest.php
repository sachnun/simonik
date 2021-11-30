<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKetetapanPajakRequest extends FormRequest
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
        // validasi data npwp, nama_wp, nomor_skp, nomor_lhp, tanggal_skp , tanggal_lhp, nominal_terbit, nominal_disetujui
        return [
            'npwp' => 'required|max:20',
            'nama_wp' => 'required|max:100',
            'nomor_skp' => 'required|max:20',
            'nomor_lhp' => 'required|max:20',
            'tanggal_skp' => 'required|date',
            'tanggal_lhp' => 'required|date',
            'nominal_terbit' => 'required|numeric',
            'nominal_disetujui' => 'required|numeric',
        ];
    }
}
