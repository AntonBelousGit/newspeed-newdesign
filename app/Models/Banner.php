<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => 'array',
        'views' => 'array',
    ];
    protected $fillable = [
        'model',
        'model_id',
        'url',
        'img',
        'value',
        'views',
    ];

    public static function add($fields){
        //dd($fields);
        $event = new static;
        if(isset($fields['model_id']) && isset($fields['model'])) {
            $object = $event->updateOrCreate(
                [
                    'model' => $fields['model'],
                    'model_id' => $fields['model_id'],
                    'url' => $fields['url'],
                ],
                [
                    'img' => $fields['img'] ?? null,
                    'value' => ['id'=>'', 'title' =>$fields['title'] ?? null, 'url'=>$fields['url'] ?? null, 'img'=>''],
//                  'cookie' => $fields['cookie_page_view_value'] ?? null,
//                  'registered_timestamps' => json_encode([$fields['registered_timestamps']]) ?? null,
//                  'counter' => $fields['counter'] ?? null,
                ],
            );
        }
        return $object;
    }
    public function UploadBannerImage($file)
    {

        $image = $this->img;
        dd($image);
        // dd(public_path('users_photo/'.$photo));
        if(null !== $image) {
            if (file_exists(public_path('storage/galleries/banners/'.$image))) {
                unlink(public_path('storage/galleries/banners/'.$image));
            }
        }
        $filename = 'banners/'.str_replace(',', '', str_replace(' ', '',$this->model.'_'.$this->id.'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME). '_' . time(). '.'.$file->extension()));
        $file->storeAs('public/galleries/', $filename);
        $value = $this->value;
        $value['img'] = $filename;
        $this->update([
            'img' =>$filename,
            'value'=>$value,
        ]);
        return $this;
    }
}
