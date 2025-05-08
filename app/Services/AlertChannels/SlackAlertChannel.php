<?php

namespace App\Services\AlertChannels;

use App\Abstracts\AlertChannel;

class SlackAlertChannel extends AlertChannel
{
    public function key(): string
    {
        return 'slack';
    }
}
