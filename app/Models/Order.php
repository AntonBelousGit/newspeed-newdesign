<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'products' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'products',
        'payment',
        'delivery',
        'address',
        'status',
    ];

    public static function add(array $fields)
    {
        $event = new static;
        $event->fill($fields);
        $event->save();
        return $event;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

}
