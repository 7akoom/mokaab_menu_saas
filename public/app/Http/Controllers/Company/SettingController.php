<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\Company\CompanyService;
use App\Http\Requests\Company\Company\UpdateCompanyRequest;

class SettingController extends Controller
{
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
    public function index()
    {
        $setting = $this->companyService->getCurrentCompanySettings();

        return view('company.settings.index', compact('setting'));
    }

    public function edit()
    {
        return view('company.settings.edit', $this->companyService->getEditData());
    }

    public function update(UpdateCompanyRequest $request)
    {
        $company = app('currentCompany');
        $this->companyService->updateCompanySettings($company, $request->validated());

        return redirect()->route('company.settings.index', ['company' => $company->domain])
            ->with('success', 'تم تحديث الإعدادات بنجاح.');
    }

    public function editImage()
    {
        $setting = $this->companyService->getCurrentCompanySettings();
        return view('company.settings.image', compact('setting'));
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:2048'],
        ]);

        $company = app('currentCompany');
        $setting = $company->settings;

        // حذف الصورة القديمة إن وجدت
        if ($setting->image) {
            Storage::disk('public')->delete($setting->image->path);
            $setting->image()->delete();
        }

        $path = $request->file('image')->store('settings', 'public');

        $setting->image()->create([
            'path' => $path,
            'company_id' => $company->id,
        ]);

        return redirect()->route('company.settings.index', ['company' => $company->domain])
            ->with('success', 'تم تحديث الصورة بنجاح.');
    }
}
