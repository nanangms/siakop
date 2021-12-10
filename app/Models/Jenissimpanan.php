<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Jenissimpanan extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'jenissimpanan';
    protected $fillable = ['kode_jenis','posisi','rekening_id','nama_jenis','uuid'];
}
