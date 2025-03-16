<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'image_path'];

    // Relationship: RoomImage belongs to a Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}