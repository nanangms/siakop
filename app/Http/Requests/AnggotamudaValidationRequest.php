<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotamudaValidationRequest extends FormRequest
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
            'gudep_id'        =>'required',
            'no_gudep'        =>'required',
            'kwaran_id'       =>'required',
            'kode_kwaran'     =>'required',
            'kwarcab'         =>'required',
            'jenis_anggota'   =>'required',

            'nama_anggota'    =>'required',
            't4_lahir'        =>'required',
            'tgl'             =>'required', 
            'bulan'           =>'required', 
            'tahun'           =>'required', 

            'jk'              =>'required',
            'kode_jk'         =>'required',
            'tahun_anggota'   =>'required',
            //'prestasi'        =>'required',
            'tanda_kecakapan' =>'required',
            'pilihan_tku'     =>'required_if:tanda_kecakapan,==,TKU',
            'kategori_anggota'=>'required'
        ];
    }

    public function messages()
    {
        return [
            "pilihan_tku.required_if" => "Pilih Jenis TKU",
        ];
    }
}
