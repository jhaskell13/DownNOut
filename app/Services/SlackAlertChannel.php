<?php

namespace App\Services;

use App\Contracts\AlertChannel;

class SlackAlertChannel implements AlertChannel
{
    public function send(string $message, array $context = []): bool
    {
        // dump("SLACK SENT!");
        return true;
    }

    public function key(): string
    {
        return 'slack';
    }
}