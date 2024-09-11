<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Article;
use App\Models\Category;
use App\Models\Sport;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index() {
        $userCount = User::count();
        $categoryCount = Category::count();
        $articleCount = Article::count();
        $videoCount = Video::count();
        $adCount = Ad::count();
        $scatCount = Subcategory::count();
        $sportCount = Sport::count();
        return view('admin.layouts.dashboardAdmin',compact('userCount','categoryCount','scatCount','articleCount','videoCount','adCount', 'sportCount'));
    }
}
