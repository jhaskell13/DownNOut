<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GithubStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $message,
        public array $context = [],
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return collect(config('alertchannel.channels'))
            ->filter(fn ($channel) => $channel)
            ->keys()
            ->toArray();
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->subject('Github Services may be down.')
            ->line('The status of one or more Github services has changed.')
            ->line('The following services are failing:');

        foreach ($this->context['failing_services'] as $index => $service) {
            $i = $index + 1;
            $message->line("{$i}: [{$service['component']}] -> [{$service['status']}]");
        }

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
