<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Simpanan extends Model
{
    
    use Uuid;
    use HasFactory;
    protected $table = 'simpanan';
    protected $guard = [];

    public function jenissimpanan(){
        return $this->belongsTo('App\Models\Jenissimpanan');
    }

    public function anggota(){
        return $this->belongsTo('App\Models\Anggota');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
