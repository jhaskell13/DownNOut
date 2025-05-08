<?php

namespace App\Services\AlertChannels;

use App\Abstracts\AlertChannel;

class WebhookAlertChannel extends AlertChannel
{
    protected function routeNotification(): string
    {
        return 'webhook_url';
    }

    public function key(): string
    {
        return 'webhook';
    }
}