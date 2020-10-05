<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
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
            'nama_kelas' => 'required',
            'kompetensi_keahlian_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_kelas.required' => ':attribute harus diisi',  
            'kompetensi_keahlian_id.required' => 'Kompetensi harus diisi',
        ];
    }
}
