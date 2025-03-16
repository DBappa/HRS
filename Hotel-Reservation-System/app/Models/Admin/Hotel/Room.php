<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_number',
        'room_name',
        'room_description',
        'room_price',
        'room_capacity',
        'floor_number',
        'is_active',
        'status_id',
        'user_id',
    ];

    // Relationship: Room belongs to a Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // Relationship: Room has many RoomImages
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    // Relationship: Room belongs to a Status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    // Relationship: Room has many Facilities
    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    // Relationship: Room belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
