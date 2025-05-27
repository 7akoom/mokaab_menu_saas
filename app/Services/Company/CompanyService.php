<?php

namespace App\Services\Company;

use App\Models\Image;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function getCurrentCompanySettings(): ?Company
    {
        $company = app('currentCompany');

        return Company::with(['settings', 'logo'])->find($company->id);
    }

    public function getEditData(): array
    {
        $setting = $this->getCurrentCompanySettings();
        $themes = \App\Enums\Company\ThemeEnum::cases();

        return compact('setting', 'themes');
    }

    public function updateCompanySettings($company, array $data): void
    {
        $setting = $company->settings;

        if ($setting) {
            $setting->update([
                'theme' => $data['theme'],
                'primary_color' => $data['primary_color'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'email' => $data['email'],
                'address_1' => $data['address_1'],
                'address_2' => $data['address_2'],
                'facebook_url' => $data['facebook_url'],
                'instagram_url' => $data['instagram_url'],
                'about_us' => $data['about_us'],
            ]);
        }

        if (!empty($data['password'])) {
            $company->password = Hash::make($data['password']);
            $company->save();
        }

        if (request()->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo->path);
                $company->logo->delete();
            }

            $path = request()->file('logo')->store('logos', 'public');

            $company->logo()->create(
                [
                    'company_id' => $company->id,
                    'path' => $path
                ]
            );
        }
    }
}
