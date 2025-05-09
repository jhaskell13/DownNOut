<?php

namespace App\Listeners;

use App\Contracts\AlertChannelInterface;
use App\Events\ServiceDownDetected;

class SendServiceDownAlert
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ServiceDownDetected $event): void
    {
        $channels = app()->tagged('alert.channel');

        foreach ($channels as $channel) {
            if (! $channel || ! $channel instanceof AlertChannelInterface) {
                throw new \Exception("Invalid or unsupported channel [{$channel->key()}] given.");
            }

            if (config("alertchannel.channels.{$channel->key()}")) {
                $event->context['channel'] = $channel->key();
                $channel->send($event->message, $event->context);
            }
        }
    }
}
