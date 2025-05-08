<?php

namespace App\Contracts;

interface AlertChannelInterface
{
    public function send(string $message, array $context = []): bool;

    public function key(): string;
}
