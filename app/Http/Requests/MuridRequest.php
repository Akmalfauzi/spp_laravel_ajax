<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuridRequest extends FormRequest
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
        return [
            'nama_murid' => 'required',
            'nis' => 'required|numeric|unique:murid,nis,except,'.$this->id,
            'nisn' => 'required|numeric|unique:murid,nisn,except,'.$this->id,
            'nama_murid' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users,email,except,'.$this->id,
            'spp_id' => 'required',
            'kelas_id' => 'required',
            'no_telp' => 'required|numeric',
            'password' => 'required|alpha_num'
        ];
    }
}
