<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Hotel extends Model
{
    use HasFactory;

    protected static function booted()
    {
        parent::booted();
        static::addGlobalScope('withCity', function (Builder $builder){
            $builder->with('city');
        });
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
