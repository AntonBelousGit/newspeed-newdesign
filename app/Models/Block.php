<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $casts = [
        'ids' => 'array',
        'value' => 'array',
    ];
    protected $fillable = [
        'title',
        'slug',
        'position',
        'status',
        'model',
        'themplate',
        'ids',
    ];
    /**
     * @var mixed
     */

    public function items(){
        if($this->status > 0){
            $model = $this->model;
            $slug = $this->slug;
            return $this->$model($slug);
        }
        return null;
    }
    public function gallery($slug){

        $gallery = Gallery::where('name', '=', $slug);
        if($gallery->exists() && count($gallery_value = $gallery->first()->value ) > 0){
            return $gallery_value;
        }
        return null;
    }
    public function popcat(){
        return null;
        $gallery = Gallery::where('slug', '=', 'sliders');
        if($gallery->exists() && count($gallery_value = $gallery->first()->value) > 0){
            return $gallery_value;
        }
        return null;
    }
    public function promotions($slug){
        $promotions = self::where('slug', '=', $slug);
        if($promotions->exists()){
           $products_array =  $promotions->first()->ids ?? [1];
           return Product::whereIn('id', $products_array)->get();
        }
        return null;
    }
    public function featured($slug){
        $featured = self::where('slug', '=', $slug);
        if($featured->exists()){
            $products_array =  $featured->first()->ids;
            return Product::whereIn('id', $products_array)->get();
        }
        return null;
    }
    public function value($slug){
        $value = self::where('slug', '=', $slug);
        if($value->exists()){
//            return true;
           return $value_array =  $value->first()->value;
        }
        return null;
    }
    public static function add($fields){
        $max_position = self::max('position');
        $fields['position'] = $max_position + 1;
        $event = new static;
        $event->fill($fields);
        $event->save();
        return $event;
    }
    public static function move_product_to_block($data){
        $block_db = self::where('slug', '=', $data['block']);
        if($block_db->exists()){
            $event = $block_db->first();
            //return json_encode($block_db->first());
            if($event->ids !== null){
                $ids = $event->ids;
                array_push($ids, $data['id']);
                sort($ids);
                $event->update([
                    'ids' =>$ids,
                ]);
            }else{
                $event->update([
                    'ids' =>[$data['id']],
                ]);
            }
        }
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
