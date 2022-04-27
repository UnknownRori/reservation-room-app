<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function RoomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
