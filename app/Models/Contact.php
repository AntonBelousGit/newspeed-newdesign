<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $casts = [
        'value' => 'array',
    ];
    protected $fillable = [
        'name',
        'slug',
        'value',
    ];
    public static function add($fields){
        $event = new static;
        $event->fill($fields);
        $event->save();
        return $event;
    }

    public static function update_contact(array $fields, Contact $contact)
    {
        //dd($contact->slug);
        $event = new static;
        if(isset($contact->slug) ) {
            $event->updateOrCreate(
                ['slug' => $contact->slug],
                [
                    'value' => $fields['value'],
                ],
            );
        }
        return $event;
    }
}
