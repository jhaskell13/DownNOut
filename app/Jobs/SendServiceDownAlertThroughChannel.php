<?php

namespace App\Jobs;

use App\Contracts\AlertChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;

class SendServiceDownAlertThroughChannel implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $channelClass,
        public string $message,
        public array $context = [],
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $channel = app()->make($this->channelClass);

        if (! $channel || ! $channel instanceof AlertChannel) {
            throw new \Exception("Invalid or unsupported channel [{$channel->key()}] given.");
        }

        $channel->send($this->message, $this->context);
    }
}
