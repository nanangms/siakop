<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    //use HasFactory;
    protected $table = 'menu';

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu','id_menu');
    }
}
