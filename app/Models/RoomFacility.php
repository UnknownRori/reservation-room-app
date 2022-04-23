<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RoomFacility extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setImgAttribute($value)
    {
        $this->attributes['img'] = Storage::putFile('/public/roomfacility', $value);
    }

    public function Room()
    {
        $this->belongsTo(Room::class, 'room_id');
    }
}
