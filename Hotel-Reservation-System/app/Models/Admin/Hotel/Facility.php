<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'hotel_id'];

    // Relationship: Facility belongs to a Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // Relationship: Facility belongs to many Rooms
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}