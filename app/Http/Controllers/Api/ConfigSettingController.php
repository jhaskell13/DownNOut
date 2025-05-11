<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigSettingUpdateRequest;
use App\Models\ConfigSetting;
use App\Services\ConfigSettingService;
use Illuminate\Http\JsonResponse;

class ConfigSettingController extends Controller
{
    public function __construct(protected ConfigSettingService $configService) {}

    public function index(): JsonResponse
    {
        return response()->json(ConfigSetting::all());
    }

    public function create(ConfigSettingUpdateRequest $request): JsonResponse
    {
        return response()->json(ConfigSetting::create($request->all()));
    }

    public function update(ConfigSettingUpdateRequest $request): JsonResponse
    {
        return response()->json($this->configService->update($request->all()));
    }
}
