<?php

namespace App\Services\AlertChannels;

use App\Contracts\AlertChannel;

class WebhookAlertChannel implements AlertChannel
{
    public function send(string $message, array $context = []): bool
    {
        // dump("WEBHOOK SENT!");
        return true;
    }

    public function key(): string
    {
        return 'webhook';
    }
}