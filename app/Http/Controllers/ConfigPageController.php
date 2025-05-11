<?php

namespace App\Http\Controllers;

use App\Models\ConfigSetting;
use App\Services\ConfigSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ConfigPageController extends Controller
{
    public function __construct(protected ConfigSettingService $configService) {}

    public function index(): Response
    {
        return Inertia::render('Config', [
            'allSettings' => ConfigSetting::all(),
        ]);
    }

    public function create(Request $request): RedirectResponse
    {
        $newSetting = ConfigSetting::create($request->all());

        return redirect()->back()->with([$newSetting]);
    }

    public function update(Request $request): RedirectResponse
    {
        $updatedSettings = $this->configService->update($request->all());

        return redirect()->back()->with([$updatedSettings]);
    }
}
