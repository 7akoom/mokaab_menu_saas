<?php

namespace App\Http\Requests\Company\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('company')->check();
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'manufacture' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'qty' => 'required|numeric',
            'dimention' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'delivery' => 'required|string',
            'description' => 'required|string',
            'images' => 'nullable|array|max:4',
            'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'


        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'حقل التصنيف مطلوب.',
            'category_id.exists' => 'التصنيف المحدد غير موجود.',

            'name.required' => 'اسم المنتج مطلوب.',
            'name.max' => 'اسم المنتج يجب ألا يتجاوز 255 حرفًا.',

            'type.required' => 'نوع المنتج مطلوب.',
            'type.max' => 'نوع المنتج يجب ألا يتجاوز 255 حرفًا.',

            'manufacture.required' => 'اسم المُصنِّع مطلوب.',
            'manufacture.max' => 'اسم المُصنِّع يجب ألا يتجاوز 255 حرفًا.',

            'price.required' => 'السعر مطلوب.',
            'price.numeric' => 'السعر يجب أن يكون رقمًا.',

            'discount.numeric' => 'قيمة الخصم يجب أن تكون رقمًا.',

            'qty.required' => 'الكمية مطلوبة.',
            'qty.numeric' => 'الكمية يجب أن تكون رقمًا.',

            'dimention.required' => 'الأبعاد مطلوبة.',
            'size.required' => 'الحجم مطلوب.',
            'color.required' => 'اللون مطلوب.',
            'delivery.required' => 'معلومات التوصيل مطلوبة.',
            'description.required' => 'الوصف مطلوب.',

            'images.max' => 'يمكنك رفع حتى 4 صور فقط.',
            'images.*.image' => 'كل ملف يجب أن يكون صورة صحيحة.',
            'images.*.max' => 'حجم كل صورة يجب ألا يتجاوز 2 ميغابايت.',

        ];
    }
}
