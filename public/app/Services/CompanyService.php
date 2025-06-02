<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Image;
use App\Models\Company;
use App\Models\Setting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function getCompaniesWithStats(): array
    {
        $companies = Company::with('logo')->get();

        return [
            'companies' => $companies,
            'companiesCount' => $companies->count(),
            'activeCount' => Company::active()->count(),
            'inActiveCount' => Company::inActive()->count(),
        ];
    }

    public function createCompany(array $data, ?UploadedFile $logo = null): Company
    {
        $company = new Company();
        $company->fill([
            'name' => $data['name'],
            'domain' => $data['domain'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'start_date' => $data['start_date'],
            'expire_date' => $data['expire_date'],
        ]);
        $company->save();
        $setting = new Setting();
        $setting->fill([
            'company_id' => $company->id,
            'email' => $data['email'],
            'phone_1' => $data['phone'],
        ]);
        $setting->save();

        $banner = new Banner();
        $banner->fill([
            'company_id' => $company->id,
            'title' => 'أفخر الأنواع تناسب ذوقك',
            'main_text' => 'جمال يستقر حيث تبدأ كل خطوة',
            'sub_text' => 'تحت كل خطوة، تُروى حكاية من الحجر والبريق — صيغت من الأرض، وقبلتها النار، لتوقظ المكان بجمال لا يزول',
        ]);
        $banner->save();


        if ($logo) {
            $path = $logo->store('logos', 'public');

            $company->logo()->create([
                'company_id' => $company->id,
                'path' => $path,
            ]);
        }

        return $company;
    }

    public function updateCompany(Company $company, array $data): void
    {
        $company->fill([
            'name' => $data['name'],
            'domain' => $data['domain'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'start_date' => $data['start_date'],
            'expire_date' => $data['expire_date'],
        ]);

        if (!empty($data['password'])) {
            $company->password = Hash::make($data['password']);
        }

        if (isset($data['status'])) {
            $company->status = $data['status'];
        }

        $company->save();

        if (request()->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo->path);
                $company->logo->delete();
            }

            $path = request()->file('logo')->store('logos', 'public');

            $company->logo()->create([
                'company_id' => $company->id,
                'path' => $path,
            ]);
        }
    }
}
