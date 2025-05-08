<?php

namespace App\Http\Controllers;

use App\Services\GithubServiceChecker;
use App\Services\HttpServiceChecker;
use Illuminate\Http\Request;
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
