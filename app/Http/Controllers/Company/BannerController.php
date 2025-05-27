<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\Company\BannerService;
use App\Http\Requests\Company\Banner\UpdateBannerRequest;

class BannerController extends Controller
{
    protected $bannerService;
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function edit()
    {
        $companyId = app('currentCompany')->id;
        $banner = $this->bannerService->getOrCreateForCompany($companyId);

        return view('company.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request)
    {
        $companyId = app('currentCompany')->id;

        $this->bannerService->updateBanner(
            $companyId,
            $request->validated(),
            $request->file('image')
        );

        return redirect()->route('company.settings.index', ['company' => app('currentCompany')->domain])
            ->with('success', 'تم تحديث البانر بنجاح');
    }
}
