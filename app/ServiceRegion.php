<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRegion extends Model
{
    protected $guarded = ['id'];

    protected $hidden = ['shape'];
}
