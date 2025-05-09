<?php

namespace App\Abstracts;

use App\Contracts\AlertChannelInterface;
use App\Notifications\GitHubStatusNotification;
use App\Notifications\Notifiable\Recipient;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;

abstract class AlertChannel implements AlertChannelInterface
{
    public function send(string $message, array $context = []): bool
    {
        try {
            // Rate limit alerts to 5 attempts per channel per 2 minute window
            if (RateLimiter::tooManyAttempts($key = "alert:{$this->key()}", $maxAttempts = 5)) {
                return false;
            }

            RateLimiter::hit($key, $decay = 120);
            Notification::send(new Recipient, new GithubStatusNotification($message, $context));
        } catch (\Exception $e) {
            throw new \Exception("Failed to alert [{$this->key()}] channel: [{$e->getMessage()}]");
        }

        return true;
    }
}
