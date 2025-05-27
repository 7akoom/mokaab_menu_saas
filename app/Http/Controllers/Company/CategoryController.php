<?php

namespace App\Http\Controllers\Company;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Company\CategoryService;
use App\Http\Requests\Company\Category\StoreCategoryRequest;
use App\Http\Requests\Company\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $company = app('currentCompany');
        $categories = $this->categoryService->getAll($company->id);
        return view('company.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('company.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $companyId = auth('company')->id();

        $this->categoryService->store($companyId, $request->validated());

        return redirect()
            ->route('company.categories.index', ['company' => app('currentCompany')->domain])
            ->with('success', 'تمت إضافة الفئة بنجاح');
    }

    public function edit($domain, Category $category)
    {
        return view('company.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $domain, Category $category)
    {
        $this->categoryService->update($category, $request->validated());

        return redirect()
            ->route('company.categories.index', ['company' => $domain])
            ->with('success', 'تم تحديث الفئة بنجاح');
    }

    public function destroy($domain, Category $category)
    {
        $this->categoryService->destroy($category);

        return redirect()
            ->route('company.categories.index', ['company' => $domain])
            ->with('success', 'تم حذف الفئة بنجاح');
    }
}
