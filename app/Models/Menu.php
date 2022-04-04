<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
      'menu_id','sort','title','slug','status','icon','name'
    ];

//    protected $with = 'children';

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'menu_id');
    }
}
