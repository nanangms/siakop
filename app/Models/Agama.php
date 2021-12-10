<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Agama extends Model
{
    use HasFactory; 
    use Uuid;

    protected $table = 'agama';
    protected $fillable = ['nama_agama','uuid'];

    public function anggota(){
        return $this->hasMany(Anggota::class);
    }
}
