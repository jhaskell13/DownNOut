<?php

namespace App\Services\AlertChannels;

use App\Abstracts\AlertChannel;

class WebhookAlertChannel extends AlertChannel
{
    public function key(): string
    {
        return 'webhook';
    }
}