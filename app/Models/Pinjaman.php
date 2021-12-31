<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Pinjaman extends Model
{
    use Uuid;
    use HasFactory;
    protected $table = 'pinjaman';
    protected $guard = [];
}
