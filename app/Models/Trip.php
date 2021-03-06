<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function passengers()
    {
        return $this->hasMany(passenger::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'id', 'creator_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
