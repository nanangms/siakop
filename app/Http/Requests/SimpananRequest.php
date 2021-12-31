<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimpananRequest extends FormRequest
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
            'anggota_id'        => 'required',
            //'no_urut'           => 'required',
            'no_transaksi'      => 'required|unique:simpanan',
            'tgl_transaksi'     => 'required',
            'jenis_transaksi'   => 'required',
            'jenissimpanan_id'  => 'required',
            'keterangan'        => 'required',
            'jumlah'            => 'required'
        ];
    }

    public function messages()
    {
        return [
            "anggota_id.required" => "Silahkan Pilih Anggota",
            "no_transaksi.required" => "No Transaksi Harus diisi",
            "no_transaksi.unique" => "No. Transaksi sudah ada, Silahkan Refresh Halaman ini",
            "tgl_transaksi.required" => "Tgl Transaksi Harus diisi",
            "jenis_transaksi.required" => "Pilih Jenis Transaksi",
            "jenissimpanan_id.required" => "Pilih Posisi Transaksi",
            "keterangan.required" => "Keterangan harus diisi",
            "jumlah.required" => "Jumlah harus diisi"
        ];
    }
}
