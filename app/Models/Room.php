<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setImgAttribute($value)
    {
        $this->attributes['img'] = Storage::putFile('/public/room', $value);
    }

    public function RoomFacility()
    {
        return $this->hasMany(RoomFacility::class, 'room_id');
    }
}
