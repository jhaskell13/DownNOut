<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface ServiceChecker
{
    public function check(string $url): JsonResponse;
}
