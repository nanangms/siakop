<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Jenispinjaman extends Model
{
    use HasFactory;

    use Uuid;

    protected $table = 'jenispinjaman';
    protected $fillable = ['nama_jenis','uuid'];
}
