<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\HomeLogo;
use App\Models\Admin\HomeSection;
use App\Models\Admin\Services;
use App\Models\Client;
use App\Models\RecentWork;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.main');
    }

    public static function MainPage()
    {
        $HomeLogo = HomeLogo::first();
        $HomeSection = HomeSection::first();
        $HomeService = Services::first();
        $client = Client::first();
        $recentWork = RecentWork::all();
        $about = About::first();
        return view('welcome', compact('HomeSection', 'HomeLogo', 'HomeService', 'client', 'recentWork', 'about'));
    }
}
