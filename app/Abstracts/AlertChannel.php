<?php

namespace App\Abstracts;

use App\Contracts\AlertChannelInterface;
use App\Models\AlertSent;
use App\Notifications\GitHubStatusNotification;
use App\Notifications\Notifiable\AlertRecipient;
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
            Notification::send($recipient = new AlertRecipient, new GithubStatusNotification($message, $context));

            $routeMethod = 'routeNotificationFor'.ucfirst($this->key());
            AlertSent::create([
                'channel'            => $this->key(),
                'notification_route' => implode(', ', $recipient->{$routeMethod}()),
                'alert_description'  => $message,
            ]);
        } catch (\Exception $e) {
            throw new \Exception("Failed to alert [{$this->key()}] channel: [{$e->getMessage()}]");
        }

        return true;
    }
}
