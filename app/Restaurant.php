<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = ['id'];

    public function scopeClosestTo($query, $latitude, $longitude)
    {
        return $query->orderByRaw("
           ST_Distance_Sphere(
                point(longitude, latitude),
                point(?, ?)
            ) asc
        ", [
            $longitude,
            $latitude,
        ]);
    }
}
