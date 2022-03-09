<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => 'array',
        'views' => 'array',
    ];
    protected $fillable = [
        'name',
        'value',
        'views',
    ];


    public static function move_banner_to_gallery($banner)
    {
        $banner_value = Banner::where('id', '=', $banner['id'])->first()->value;
        $gallery = Gallery::where('name', $banner['gallery']);
        if (!$gallery->exists()) {
            $event = new static;
            $gallery = $event->updateOrCreate(
                [
                    'name' => $banner['gallery'],
                ],
                [
                    'value' => [$banner_value],
                ],
            );
        } else {
            $gallery_value = $gallery->first()->value ?? [];
            array_push($gallery_value, $banner_value);
            $gallery->update([
                'value' => $gallery_value,
            ]);
        }
        return $gallery;
    }

    public static function delete_banner_from_gallery($banner)
    {
//        $mainslider = Gallery::where('name', $banner['gallery']);
//        $mainslider_value = $mainslider->first()->value;
//        array_push($mainslider_value, $banner_value);
//
//        $mainslider->update([
//            'value' => $mainslider_value,
//        ]);
//        return $mainslider;
    }

    public static function add($fields)
    {
        $event = new static;
        $event->fill($fields);
        $event->save();
    }
}
