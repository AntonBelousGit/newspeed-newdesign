<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserField extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'photo',
        'phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public static function add_field($data){
        $user_id = Auth::id();
        $favourite_users_ids = [$data['favourite_users_ids']];
        $user_field = self::select('favourite_users_ids')->where('user_id', '=', $user_id)->first();
        if($user_field !== null) {
            $favourite_users_ids_json = $user_field->favourite_users_ids;
            if (strlen($favourite_users_ids_json) > 0) {
                $favourite_users_ids_array = json_decode($favourite_users_ids_json, true);
                array_push($favourite_users_ids_array, $favourite_users_ids[0]);
                $favourite_users_ids = array_values(array_unique($favourite_users_ids_array));
            }
        }

        $event = new static;
        if(isset($data['favourite_users_ids']) && isset($user_id) ) {
            $event->updateOrCreate(
                ['user_id' => $user_id],
                ['favourite_users_ids' => json_encode($favourite_users_ids)],
            );
        }
        return $event;
    }
}
