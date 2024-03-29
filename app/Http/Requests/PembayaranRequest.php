<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
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
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required',
            'murid_id' => 'required',
            'spp_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required'
        ];
    }
}
