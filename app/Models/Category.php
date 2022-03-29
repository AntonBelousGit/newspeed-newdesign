<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'status', 'slug', 'category_id', 'name', 'id', 'description', 'seo_description', 'popular', 'photo', 'recomend', 'image'
    ];

//    public function categories()
//    {
//        return $this->hasMany(Category::class);
//    }

    public function categoriesParent()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class);
    }

    public static function add($fields) // Добавление события
    {
        //dd($fields);
        $category = new static;
        $category->fill($fields);
        // $category->photo = $fields['gallery'][0];

        return $category;
    }

    public static function related()
    {
        return self::where('recomend', 'on')->limit(10)->get();
    }

    public static function getCategories()
    {
        return self::whereNull('category_id')
                    ->with('childrenCategories')
                    ->get();
    }

}
