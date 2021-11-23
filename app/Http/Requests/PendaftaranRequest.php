<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
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
            'gudep_id'=>'required',
            'name'=>'required',
            'no_hp'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'konfirmasi_password'=>'required|min:6|same:password',
            'captcha' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            "gudep_id.required" => "Silahkan Cek Nomor Gudep Terlebih dahulu",
            "name.required" => "Nama Harus diisi",
            "no_hp.required" => "No. Hp Harus diisi",
            "email.required" => "Email Harus diisi",
            "email.unique" => "Email Sudah terdaftar, silahkan gunakan email lain",
            "password.min" => "Password Minimal 6 Karakter",
            "captcha.required" => "Masukan kode Captcha",
            "password.required" => "Password tidak boleh kosong",
            "konfirmasi_password.required" => "Konfirmasi Password tidak boleh kosong",
        ];
    }
}
