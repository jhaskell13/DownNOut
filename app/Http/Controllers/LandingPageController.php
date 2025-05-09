<?php

namespace App\Http\Controllers;

use App\Models\AlertSent;
use Inertia\Inertia;
use Inertia\Response;

class LandingPageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Landing', [
            'latestAlerts' => AlertSent::latest()->take(100)->get(),
        ]);
    }
}
