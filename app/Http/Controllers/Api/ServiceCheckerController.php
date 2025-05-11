<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ServiceCheckers\GithubServiceChecker;
use App\Services\ServiceCheckers\HttpServiceChecker;
use Illuminate\Http\JsonResponse;

class ServiceCheckerController extends Controller
{
    public function httpStatus(HttpServiceChecker $checker): JsonResponse
    {
        $status = $checker->check(request()->input('url'));

        return response()->json($status);
    }

    public function githubStatus(GithubServiceChecker $checker): JsonResponse
    {
        $status = $checker->check();

        return response()->json($status);
    }
}
