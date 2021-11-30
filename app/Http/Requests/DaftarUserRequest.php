<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaftarUserRequest extends FormRequest
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
        // validasi nama_depan, nama_belakang, nip_sikka, role
        return [
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required|min:3',
            'nip_sikka' => 'required|min:3',
            'role' => 'required',
        ];
    }
}
