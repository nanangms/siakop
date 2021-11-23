<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Faq extends Model
{	use Uuid;
    use HasFactory;
    protected $table = 'faq';
    protected $fillable = ['pertanyaan','jawaban','urutan','kategori','uuid'];
}
