<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'token',
        'user_ip',
        'browser',
        'cookie',
        'new_timestamps',
        'registered_timestamps',
        'counter',
    ];
    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d');
    }
    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public static function add(array $fields)
    {
        $fields['new_timestamps'] = isset($fields['new_timestamps']) && $fields['new_timestamps'] !== null ? json_encode([$fields['cookie'] = $fields['new_timestamps']]) : NULL;
        //$fields['registered_timestamps'] =isset($fields['registered_timestamps']) && $fields['registered_timestamps'] !== null ? json_encode([$fields['cookie']= $fields['registered_timestamps']]): NULL;
        $fields['registered_timestamps'] = NULL;
        $event = new static;
        $event->fill($fields);
        $event->save();
        return $event;
    }

    public static function update_registered_user_view(array $fields, $user_ip_browser = NULL)
    {
        $user_ip_browser == NULL ?: self::find($user_ip_browser)->delete();
        $event = new static;
        if(isset($fields['user_id']) ) {
            $object = $event->updateOrCreate(
                [
                    'user_id' => $fields['user_id'],
                ],
                [
                    'token' => $fields['token'],
                    'user_ip' => $fields['user_ip'] ?? null,
                    'browser' => $fields['browser'] ?? null,
                    'cookie' => $fields['cookie_page_view_value'] ?? null,
                    'registered_timestamps' => json_encode([$fields['registered_timestamps']]) ?? null,
                    'counter' => $fields['counter'] ?? null,
                ],
            );
        }
        return $object->id;
    }

    public static function update_unregistered_user_view(array $fields, $unregistered_user_view_id)
    {
        $event = new static;
        if(isset($unregistered_user_view_id) ) {
            $object = $event->updateOrCreate(
                [
                    'id' => $unregistered_user_view_id,
                ],
                [
                    'token' => $fields['token'],
                    'user_ip' => $fields['user_ip'] ?? null,
                    'browser' => $fields['browser'] ?? null,
                    'cookie' => $fields['cookie_page_view_value'] ?? null,
                    'new_timestamps' => json_encode([$fields['new_timestamps']]) ?? null,
                    'counter' => $fields['counter'] ?? null,
                ],
            );
        }
        return $object->id;
    }
}
