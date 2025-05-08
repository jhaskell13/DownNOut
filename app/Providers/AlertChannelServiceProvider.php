<?php

namespace App\Providers;

use App\Services\EmailAlertChannel;
use App\Services\SlackAlertChannel;
use App\Services\WebhookAlertChannel;
use Illuminate\Support\ServiceProvider;

class AlertChannelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $channels = [
            EmailAlertChannel::class,
            SlackAlertChannel::class,
            WebhookAlertChannel::class,
        ];

        foreach ($channels as $channel) {
            $this->app->bind($channel);
        }

        $this->app->tag($channels, 'alert.channel');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
