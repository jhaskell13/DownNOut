<?php

namespace App\Services\ServiceCheckers;

use App\Contracts\ServiceChecker;
use App\Enums\ServiceStatus;
use App\Events\ServiceDownDetected;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class GithubServiceChecker implements ServiceChecker
{
    public function check(string $url = 'https://www.githubstatus.com/api/v2/components.json'): JsonResponse
    {
        $response = Http::timeout(5)->get($url);

        if ($response->successful()) {
            $body = json_decode($response->body());

            $failingServices = collect($body->components)
                ->reject(fn ($component) => $component->status === ServiceStatus::Operational->value) // Filter out operational components
                ->map(fn ($component) => [
                    'id' => $component->id,
                    'component' => $component->name,
                    'status' => $component->status,
                ]);

            if ($failingServices->isEmpty()) {
                return response()->json([
                    'message' => 'All Github services are operational.',
                    'status' => ServiceStatus::Operational->value,
                    'failing_services' => [],
                ]);
            } else {
                ServiceDownDetected::dispatch($message = 'One or more Github services are unresponsive.');

                return response()->json([
                    'message' => $message,
                    'status' => ServiceStatus::Unresponsive->value,
                    'failing_services' => $failingServices,
                ]);
            }
        }
    }
}
