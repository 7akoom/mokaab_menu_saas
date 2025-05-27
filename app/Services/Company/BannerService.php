<?php

namespace App\Services\Company;

use App\Models\Banner;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BannerService
{
    public function getOrCreateForCompany(int $companyId): Banner
    {
        return Banner::firstOrCreate(
            ['company_id' => $companyId],
            [
                'title' => 'أفخر الأنواع تناسب ذوقك',
                'main_text' => 'جمال يستقر حيث تبدأ كل خطوة',
                'sub_text' => 'تحت كل خطوة، تُروى حكاية من الحجر والبريق — صيغت من الأرض، وقبلتها النار، لتوقظ المكان بجمال لا يزول',
            ]
        );
    }

    public function updateBanner(int $companyId, array $data, $image = null): Banner
    {
        $banner = Banner::where('company_id', $companyId)->firstOrFail();

        $banner->update([
            'title' => $data['title'],
            'main_text' => $data['main_text'],
            'sub_text' => $data['sub_text'] ?? null,
        ]);

        if ($image) {
            // حذف الصورة القديمة إن وجدت
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image->path);
                $banner->image()->delete();
            }

            // رفع الصورة الجديدة
            $path = $image->store('banners', 'public');

            $banner->image()->create([
                'company_id' => $companyId,
                'path' => $path,
            ]);
        }

        return $banner;
    }
}
