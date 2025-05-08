<?php

namespace App\Abstracts;

use App\Contracts\AlertChannelInterface;
use App\Notifications\GitHubStatusNotification;
use App\Notifications\Notifiable\Recipient;
use Illuminate\Support\Facades\Notification;

abstract class AlertChannel implements AlertChannelInterface
{
    // protected abstract function routeNotification(): string;

    public function send(string $message, array $context = []): bool
    {
        try {
            Notification::send(new Recipient, new GithubStatusNotification($message, $context));
        } catch (\Exception $e) {
            throw new \Exception("Failed to alert [{$this->key()}] channel: [{$e->getMessage()}]");
        }

        return true;
    }
}