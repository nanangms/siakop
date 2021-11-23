<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuid;
class Kategori extends Model
{
	use Uuid;
    use HasFactory;
    use Sluggable;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori','kategori_seo','uuid'];

    public function sluggable()
    {
        return [
            'kategori_seo' => [
                'source' => 'nama_kategori'
            ]
        ];
    }

    public function berita(){
        return $this->hasMany('App\Models\Berita');
    }
}
