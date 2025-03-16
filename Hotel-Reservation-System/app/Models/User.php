<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Admin\Hotel\Hotel;
use App\Models\Admin\Hotel\Room;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationship: User has many Hotels
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    // Relationship: User has many Rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
