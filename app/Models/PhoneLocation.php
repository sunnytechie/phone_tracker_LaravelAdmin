<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneLocation extends Model
{
    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'accuracy',
        'altitude',
        'altitude_accuracy',
        'heading',
        'speed',
    ];
}
