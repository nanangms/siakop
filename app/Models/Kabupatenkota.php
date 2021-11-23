<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Cviebrock\EloquentSluggable\Sluggable;

class Kabupatenkota extends Model
{
    use HasFactory;
    use Sluggable;
    use Uuid;
    protected $table = 'kab_kota';
    protected $fillable = ['nama_kab_kota','seo_kab_kota','uuid'];

    public function sluggable()
    {
        return [
            'seo_kab_kota' => [
                'source' => 'nama_kab_kota'
            ]
        ];
    }
}
