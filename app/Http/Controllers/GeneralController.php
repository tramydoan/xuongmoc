<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    protected $categories;
    public function __construct()
    {
        $setting = Setting::all();
        $banner = Banner::where('is_active', 1)->orderBy('position', 'ASC')->get();
        $categories = Category::where('is_active',1)->orderBy('position', 'ASC')->get();
        $this->categories = $categories;
        view()->share([
            'category' => $categories,
            'banner' => $banner,
            'setting' => $setting,
        ]);
    }
}
