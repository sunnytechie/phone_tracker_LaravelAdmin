<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneSnapshot extends Model
{
    protected $fillable = [
        'user_id',
        'file_path',
        'file_name',
    ];
}
