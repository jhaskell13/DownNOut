<?php

namespace App\Contracts;

interface ServiceChecker
{
    public function check(string $url): array;
}
