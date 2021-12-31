<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Saldo_harian extends Model
{   
    use Uuid;
    use HasFactory;

    protected $table = 'saldo_simpanan_harian';
    protected $fillable = ['anggota_id','tgl_transaksi','saldo'];

    public function anggota(){
        return $this->belongsTo('App\Models\Anggota');
    }
}