<?php

namespace App\Listeners;

use App\Events\ServiceDownDetected;
use App\Jobs\SendServiceDownAlertThroughChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
            if (config("alertchannel.channels.{$channel->key()}")) {
                SendServiceDownAlertThroughChannel::dispatch(
                    get_class($channel),
                    $event->message,
                    $event->context,
                );
            }
        }
    }
}
