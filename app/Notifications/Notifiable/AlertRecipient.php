<?php

namespace App\Notifications\Notifiable;

use Illuminate\Notifications\Notifiable;

class AlertRecipient
{
    use Notifiable;

    public function routeNotificationForMail(): array
    {
        return ['test@mailtrap.io', 'johnny@test.com', 'big_bruce@aol.com'];
    }

    public function routeNotificationForSlack(): array
    {
        return ['slack_url'];
    }

    public function routeNotificationForWebhook(): array
    {
        return ['webhook_url'];
    }
}
