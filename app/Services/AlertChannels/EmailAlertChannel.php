<?php

namespace App\Services\AlertChannels;

use App\Abstracts\AlertChannel;

class EmailAlertChannel extends AlertChannel
{
    protected function routeNotification(): string
    {
        return 'test@test.com';
    }

    public function key(): string
    {
        return 'mail';
    }

}