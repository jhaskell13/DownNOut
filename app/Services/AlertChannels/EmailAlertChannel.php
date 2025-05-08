<?php

namespace App\Services\AlertChannels;

use App\Contracts\AlertChannel;

class EmailAlertChannel implements AlertChannel
{
    public function send(string $message, array $context = []): bool
    {
        // dump("EMAIL SENT!");
        return true;
    }

    public function key(): string
    {
        return 'email';
    }
}