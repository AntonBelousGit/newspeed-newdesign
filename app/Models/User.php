<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function hasAnyRoles(array $roles){
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }
        return false;
    }
    public function hasRole(string $role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }
    public function field(){
        return $this->hasOne(UserField::class, 'user_id');
    }
    public function username(){
//        $user_name_array = array_filter([ $this->field !== null && $this->field->name ? trim($this->field->name) : NULL, $this->name, 'user',]);
//        return reset($user_name_array);
        return $this->name;
    }

    public function page_view(){
        return $this->hasOne(PageView::class, 'user_id');
    }
}
