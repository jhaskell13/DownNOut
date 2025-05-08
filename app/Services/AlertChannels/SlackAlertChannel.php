<?php

namespace App\Services\AlertChannels;

use App\Abstracts\AlertChannel;

class SlackAlertChannel extends AlertChannel
{
    protected function routeNotification(): string
    {
        return 'test_slack_url';
    }

    public function key(): string
    {
        return 'slack';
    }
}