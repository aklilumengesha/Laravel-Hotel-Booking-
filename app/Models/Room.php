<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function rRoomPhoto()
    {
        return $this->hasMany(RoomPhoto::class);
    }
//     public function reviews()
// {
//     return $this->hasMany(Review::class);
// }
    public function averageRating()
{
    return $this->reviews()->avg('rating');
}
    public function reviews()
{
    return $this->hasMany(\App\Models\Review::class);
}

public function ratingCount()
{
    return $this->reviews()->count();
}

}
