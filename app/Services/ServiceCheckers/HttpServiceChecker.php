<?php

namespace App\Services\ServiceCheckers;

use App\Contracts\ServiceChecker;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class HttpServiceChecker implements ServiceChecker
{
    public function check(?string $url): JsonResponse
    {
        $message  = 'The service is unresponsive.';
        $response = Http::timeout(5)->get($url);

        if ($response->successful()) {
            $message = 'The service is running.';
        }

        return response()->json([
            'message' => $message,
            'status'  => $response->status(),
            'body'    => json_decode($response->body()),
        ]);
    }
}
