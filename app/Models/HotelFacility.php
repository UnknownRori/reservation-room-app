<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HotelFacility extends Model
{
    use HasFactory;

    public function setImgAttribute($value)
    {
        $this->attributes['img'] = Storage::putFile('/public/hotelFacility', $value);
    }

    protected $guarded = [];
}
