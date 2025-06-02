<?php

namespace App\Services\Company;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getAll($companyId)
    {
        return Product::where('company_id', $companyId)->with('category')->latest()->get();
    }

    public function store(int $companyId, array $data, array $images = []): Product
    {
        $product = new Product();
        $product->fill([
            'company_id' => $companyId,
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'type' => $data['type'],
            'manufacture' => $data['manufacture'],
            'price' => $data['price'],
            'discount' => $data['discount'],
            'qty' => $data['qty'],
            'dimention' => $data['dimention'],
            'size' => $data['size'],
            'color' => $data['color'],
            'delivery' => $data['delivery'],
            'description' => $data['description'],
        ]);
        $product->save();

        if (!empty($images)) {
            foreach ($images as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'company_id' => $companyId,
                    'path' => $path,
                ]);
            }
        }

        return $product;
    }


    public function update(Product $product, array $data, array $images = []): Product
    {
        $product->update([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'type' => $data['type'],
            'manufacture' => $data['manufacture'],
            'price' => $data['price'],
            'discount' => $data['discount'],
            'qty' => $data['qty'],
            'dimention' => $data['dimention'],
            'size' => $data['size'],
            'color' => $data['color'],
            'delivery' => $data['delivery'],
            'description' => $data['description'],
        ]);

        if (!empty($images)) {
            foreach ($product->images as $oldImage) {
                Storage::disk('public')->delete($oldImage->path);
                $oldImage->delete();
            }

            foreach ($images as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'company_id' => $product->company_id,
                    'path' => $path,
                ]);
            }
        }

        return $product;
    }

    public function delete(Product $product): void
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        $product->delete();
    }
}
