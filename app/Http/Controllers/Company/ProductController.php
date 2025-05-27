<?php

namespace App\Http\Controllers\Company;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\Company\ProductService;
use App\Http\Requests\Company\Product\StoreProductRequest;
use App\Http\Requests\Company\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService) {}

    public function index()
    {
        $products = $this->productService->getAll(app('currentCompany')->id);

        return view('company.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('company_id', app('currentCompany')->id)->get();
        return view('company.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->store(
            auth('company')->id(),
            $request->validated(),
            $request->file('images', [])
        );


        return redirect()->route('company.products.index', ['company' => app('currentCompany')->domain])
            ->with('success', 'تمت إضافة المنتج بنجاح');
    }

    public function show($domain, Product $product)
    {
        return view('company.products.show', compact(['product', 'domain']));
    }


    public function edit($domain, Product $product)
    {
        $categories = Category::where('company_id', app('currentCompany')->id)->get();
        return view('company.products.edit', compact('product', 'categories'));
    }

    public function update($domain, UpdateProductRequest $request, Product $product)
    {
        $this->productService->update(
            $product,
            $request->validated(),
            $request->file('images', [])
        );


        return redirect()->route('company.products.index', ['company' => $domain])
            ->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($domain, Product $product)
    {
        $this->productService->delete($product);

        return back()->with('success', 'تم حذف المنتج');
    }

    public function deleteImage($domain, \App\Models\Image $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return back()->with('success', 'تم حذف الصورة');
    }

    public function getByCategory(Request $request)
    {
        $company = app('currentCompany');
        $categoryId = $request->query('category_id');

        $products = $categoryId && $categoryId !== 'all'
            ? $company->products()->where('category_id', $categoryId)->with('images')->get()
            : $company->products()->with('images')->get();

        return response()->json(['products' => $products]);
    }
}
