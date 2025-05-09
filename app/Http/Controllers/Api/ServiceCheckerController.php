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
        return $checker->check(request()->input('url'));
    }

    public function githubStatus(GithubServiceChecker $checker): JsonResponse
    {
        return $checker->check();
    }
}
