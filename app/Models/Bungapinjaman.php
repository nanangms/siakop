<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Bungapinjaman extends Model
{
    use HasFactory;
    use Uuid;
    protected $table = 'bunga_pinjaman';
    protected $fillable = ['jangka_waktu','nilai_bunga'];
}
