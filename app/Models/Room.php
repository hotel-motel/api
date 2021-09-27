<?php

namespace App\Models;

use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function isEmpty($start, $end)
    {
        $tripDays=CarbonPeriod::create($start, $end);
        $tripsInDate=$this->trips->filter(function ($trip) use ($tripDays){
            foreach ($tripDays as $day){
                if ($day>=$trip->start && $day<=$trip->end){
                    return $trip;
                }
            }
        });
        return $tripsInDate->count()==0;
    }
}
