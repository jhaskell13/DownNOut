<?php

namespace App\Services\AlertChannels;

use App\Abstracts\AlertChannel;

class EmailAlertChannel extends AlertChannel
{
    public function key(): string
    {
        return 'mail';
    }

}