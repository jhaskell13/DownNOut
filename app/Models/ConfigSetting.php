<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigSetting extends Model
{
    protected $fillable = [
        'name',
        'value',
    ];
}
