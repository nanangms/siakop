<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotadewasaValidationRequest extends FormRequest
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
            'kategori_anggota'=>'required',
            'jenis_pembina'   =>'required_if:kategori_anggota,==,Pembina',
            'jenis_pelatih'   =>'required_if:kategori_anggota,==,Pelatih',
            'jenis_pelatihan' =>'required',
            'sertifikat'      =>'mimes:jpeg,png,jpg,pdf|max:5048'
        ];
    }

    public function messages()
    {
        return [
            "jenis_pembina.required_if" => "Pilih Jenis Pembina",
            "jenis_pelatih.required_if" => "Pilih Jenis Pelatih",
        ];
    }
}
