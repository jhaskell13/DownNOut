<?php

namespace App\Notifications\Notifiable;

use Illuminate\Notifications\Notifiable;

class Recipient
{
    use Notifiable;

    public function routeNotificationForMail(): array
    {
        return ['test@mailtrap.io'];
    }
}