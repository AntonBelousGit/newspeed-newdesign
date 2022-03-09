<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'image',
        'intro',
        'text',
    ];

    public function getImageAttribute()
    {
        return ($this->attributes['image'] ? $this->attributes['image'] : '/placeholder_blog.png');
    }
    public function original_image(){
        return $this->getRawOriginal('image');
    }
    public function original_path_image(){
        if($this->original_image() !== null) {
            return asset('storage/blogs' . $this->original_image());
        }
        return null;
    }
    public function UploadBlogMainImage($file, $id)
    {
        // dd($id);
        $image = $this->original_image();
        if(null !== $image) {
            if (file_exists(public_path($this->original_path_image()))) {
                unlink(public_path($this->original_path_image()));
            }
        }
        $filename = str_replace(',', '', str_replace(' ', '','/'.$id.'/'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME). '_' . time(). '.'.$file->extension()));
        //dd($filename);
        $file->storeAs('public/blogs', $filename);
        $event = new static;
        if(isset($id) ) {
            $event->updateOrCreate(
                ['id' => $id],
                [
                    'image' => $filename,
                ],
            );
        }
        return $event;
    }
    public static function add($fields)
    {
        $event = new static;
        $fields['slug'] = Str::slug($fields['title'].'-'.Carbon::now()->toDateTimeString(), '-');
        $event->fill($fields);
        $event->save();
        return $event;
    }
    public static function update_blog($data, $id){
        $event = new static;
        if(isset($id) ) {
            $event->updateOrCreate(
                ['id' => $id],
                [
                    'title' => $data['title'],
                    'intro' => $data['intro'],
                    'text' => $data['text'],
                ],
            );
        }
        return $event;
    }
    public static function delete_main_blog_image($id){
        $blog = self::where("id", '=',$id);
        if($blog->exists()){
            $old_blog_image = $blog->first()->original_image();
            //return $old_blog_image;
            if ($old_blog_image !== null ) {
                if (file_exists(public_path('/storage/blogs/' . $old_blog_image))) {
                    unlink(public_path('/storage/blogs/' . $old_blog_image));
                }
                $FileSystem = new Filesystem();
                // Target directory.
                $blog_image_directory = public_path() . '/storage/blogs/'. $id . '/';
                // Check if the directory exists.
                if ($FileSystem->exists($blog_image_directory)) {
                    // Get all files in this directory.
                    $files = $FileSystem->files($blog_image_directory);
                    // Check if directory is empty.
                    if (empty($files)) {
                        // Yes, delete the directory.
                        $FileSystem->deleteDirectory($blog_image_directory);
                    }
                }
                $event = new static;
                if(isset($id) ) {
                    $event->updateOrCreate(
                        ['id' => $id],
                        ['image' => null],
                    );
                }
                return $event;
            }
        }
    }

    public static function blog_destroy(int $id)
    {
        self::delete_main_blog_image($id);
        $event = self::find($id);
        $event->delete($id);
    }
}
