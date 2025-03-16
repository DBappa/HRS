<?php

namespace App\Models\Admin\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    // Relationship: Status has many Rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}