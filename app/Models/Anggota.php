<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Anggota extends Model
{   
    use Uuid;
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = ['no_anggota','nik','nama_lengkap','t4_lahir','tgl_lahir','jenis_kelamin','agama_id','alamat','kota','kode_pos','no_hp','keterangan','status','uuid'];

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    public function simpanan(){
        return $this->hasMany('App\Models\Simpanan');
    }

    public function saldoharian(){
        return $this->hasMany('App\Models\Saldo_harian');
    }

    public function user(){
        return $this->hasOne('App\Models\User');
    }
}
