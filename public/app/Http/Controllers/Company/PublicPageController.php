<?php

namespace App\Http\Controllers\Company;

use App\Models\Banner;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PublicPageController extends Controller
{
    public function show()
    {
        $company = app('currentCompany');

        $settings = $company->settings()->with('image')->first();

        $themeMap = [
            'كلاسيكي' => 'classic',
            'حديث' => 'modern',
            'بسيط' => 'minimal',
        ];

        $themeKey = $themeMap[$settings->theme] ?? 'classic';

        $categories = $company->categories()->with('products.images')->get();
        $products = $company->products()->with('images')->get();
        $employees = $company->employees()->with('image')->get();
        $banner = $company->banner()->with('image')->first();

        return view("company.templates.$themeKey.index", [
            'company' => $company,
            'settings' => $settings,
            'theme' => $themeKey,
            'categories' => $categories,
            'products' => $products,
            'employees' => $employees,
            'banner' => $banner
        ]);
    }
}
