<?php

namespace App\Http\Requests\Company\Company;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::guard('company')->check();
    }

    public function rules(): array
    {
        return [
            'theme' => 'required|string',
            'primary_color' => 'required|string',
            'phone_1' => 'required|string',
            'phone_2' => 'nullable|string',
            'email' => 'required|email',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'about_us' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'theme.required' => 'حقل الثيم مطلوب.',
            'theme.string' => 'حقل الثيم يجب أن يكون نصًا.',

            'primary_color.required' => 'اللون الأساسي مطلوب.',
            'primary_color.string' => 'اللون الأساسي يجب أن يكون نصًا.',

            'phone_1.required' => 'رقم الهاتف الأول مطلوب.',
            'phone_1.string' => 'رقم الهاتف الأول يجب أن يكون نصًا.',

            'phone_2.string' => 'رقم الهاتف الثاني يجب أن يكون نصًا.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة.',

            'address_1.required' => 'العنوان الأول مطلوب.',
            'address_1.string' => 'العنوان الأول يجب أن يكون نصًا.',

            'address_2.string' => 'العنوان الثاني يجب أن يكون نصًا.',

            'facebook_url.url' => 'رابط الفيسبوك يجب أن يكون رابطًا صحيحًا.',
            'instagram_url.url' => 'رابط الانستغرام يجب أن يكون رابطًا صحيحًا.',

            'about_us.string' => 'حقل نبذة عنا يجب أن يكون نصًا.',

            'logo.image' => 'الملف المرفوع يجب أن يكون صورة.',
            'logo.mimes' => 'صيغة الصورة غير مدعومة. الصيغ المسموح بها: jpeg، png، jpg، gif، svg.',
            'logo.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميغابايت.',
        ];
    }
}
