<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\VideoService;
use App\Services\ChirpService;
use App\Services\OrderService;

class DashboardController extends Controller
{
    // get dashboard
    public function index()
    {
        $membersCount = UserService::count();

        $videosCount = VideoService::count();

        $chirpsCount = ChirpService::count();

        $ordersCount = OrderService::count();

        return view('dashboard', compact('membersCount', 'videosCount', 'chirpsCount', 'ordersCount'));
    }
}