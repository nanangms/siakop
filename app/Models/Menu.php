<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Menu extends Model
{
    use HasFactory;
	use Uuid;
    protected $table = 'menu';
    protected $fillable = ['id_menu','nama_menu','url','icon','urutan','uuid'];

    // public function menu()
    // {
    //     return $this->belongsTo(Menu::class);
    // }

    public function role()
    {
    	return $this->belongsToMany('App\Models\Role');
    }

    public function submenu()
    {
        return $this->hasMany('App\Models\Submenu','id_menu');
    }

    
}
