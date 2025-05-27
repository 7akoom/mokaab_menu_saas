<?php

namespace App\Services\Company;

use App\Models\Category;

class CategoryService
{
    public function getAll($companyId)
    {
        return Category::where('company_id', $companyId)->latest()->get();
    }

    public function store($companyId, array $data)
    {
        return Category::create([
            'company_id' => $companyId,
            'name' => $data['name'],
        ]);
    }

    public function update(Category $category, array $data)
    {
        $category->update([
            'name' => $data['name'],
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
