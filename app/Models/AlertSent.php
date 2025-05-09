<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertSent extends Model
{
    protected $table = 'alerts_sent';

    protected $fillable = [
        'channel',
        'alert_description',
        'notification_route',
    ];
}
