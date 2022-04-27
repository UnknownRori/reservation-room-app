<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RoomType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setImgAttribute($value)
    {
        $this->attributes['img'] = Storage::putFile('/public/room', $value);
    }

    public function Room()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }

    public function RoomFacility()
    {
        return $this->hasMany(RoomFacility::class, 'room_type_id');
    }

    public function Orders()
    {
        return $this->hasMany(Orders::class, 'room_type_id');
    }
}
