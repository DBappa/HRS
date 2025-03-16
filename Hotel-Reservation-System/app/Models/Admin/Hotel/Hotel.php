<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'address', 'image', 'user_id'];

    // Relationship: Hotel has many Rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    // Relationship: Hotel has many Facilities
    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    // Relationship: Hotel belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}