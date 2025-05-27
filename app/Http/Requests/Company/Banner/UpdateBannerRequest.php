<?php

namespace App\Http\Requests\Company\Banner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth('company')->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'main_text' => 'required|string',
            'sub_text' => 'nullable|string',
            'image' => 'nullable|max:2048',
        ];
    }
}
