<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotakwarcabValidationRequest extends FormRequest
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
            'nama_anggota'    =>'required',
            't4_lahir'        =>'required',
            'tgl'             =>'required', 
            'bulan'           =>'required', 
            'tahun'           =>'required', 

            'jk'              =>'required',
            'tahun_anggota'   =>'required',
            'kategori_anggota'=>'required',
            'jenis_pelatih'   =>'required_if:kategori_anggota,==,Pelatih',
            'sertifikat'      =>'mimes:jpeg,png,jpg,pdf|max:5048'
        ];
    }

    public function messages()
    {
        return [
            "jenis_pelatih.required_if" => "Pilih Jenis Pelatih",
        ];
    }
}
