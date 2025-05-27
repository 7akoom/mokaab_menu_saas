<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\{
    CategoryController,
    SettingController,
    PublicPageController,
    CompanyAuthController,
    EmployeeController,
    ProductController,
    BannerController,
    AboutController
};
use App\Http\Controllers\Admin\{
    AdminAuthController,
    AdminCompanyController
};

Route::domain('{company}.localhost')->middleware('identify.company')->group(function () {

    Route::get('/not-found', function () {
        return view('NotFound');
    })->middleware('company.active')->name('not-found');

    Route::middleware(['guest', 'company.active'])->group(function () {
        Route::get('/', [PublicPageController::class, 'show'])->name('company.public');
        Route::get('/products/by-category', [ProductController::class, 'getByCategory'])->name('company.products.byCategory');
        Route::get('/login', [CompanyAuthController::class, 'showLoginForm'])->name('company.login');
        Route::post('/login', [CompanyAuthController::class, 'login'])->name('company.login.attempt');
    });

    Route::middleware('auth:company')->group(function () {
        Route::get('/logout', [CompanyAuthController::class, 'logout'])->name('company.logout');

        Route::prefix('settings')->controller(SettingController::class)->group(function () {
            Route::get('/', 'index')->name('company.settings.index');
            Route::get('/edit', 'edit')->name('company.settings.edit');
            Route::put('/update', 'update')->name('company.settings.update');
            Route::get('/image', 'editImage')->name('company.settings.image.edit');
            Route::put('/image', 'updateImage')->name('company.settings.image.update');
        });

        Route::prefix('employees')->controller(EmployeeController::class)->group(function () {
            Route::get('/', 'index')->name('company.employees.index');
            Route::get('/create', 'create')->name('company.employees.create');
            Route::post('/', 'store')->name('company.employees.store');
            Route::get('/edit/{employee}', 'edit')->name('company.employees.edit');
            Route::put('/{employee}', 'update')->name('company.employees.update');
            Route::delete('/{employee}', 'destroy')->name('company.employees.destroy');
        });

        Route::prefix('categories')->controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->name('company.categories.index');
            Route::get('/create', 'create')->name('company.categories.create');
            Route::post('/', 'store')->name('company.categories.store');
            Route::get('/edit/{category}', 'edit')->name('company.categories.edit');
            Route::put('/{category}', 'update')->name('company.categories.update');
            Route::delete('/{category}', 'destroy')->name('company.categories.destroy');
        });

        Route::prefix('products')->controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('company.products.index');
            Route::get('/create', 'create')->name('company.products.create');
            Route::post('/', 'store')->name('company.products.store');
            Route::get('/{product}/edit', 'edit')->name('company.products.edit');
            Route::put('/{product}', 'update')->name('company.products.update');
            Route::delete('/{product}', 'destroy')->name('company.products.destroy');
        });
        Route::prefix('banner')->controller(BannerController::class)->group(function () {
            Route::get('/edit', 'edit')->name('company.banner.edit');
            Route::put('/update', 'update')->name('company.banner.update');
        });
    });
    Route::get('/items/{product}/show', [ProductController::class, 'show'])->name('products.show');
});


Route::middleware('guest')->group(
    function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.attempt');
    }
);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', [
            'companiesCount' => Company::count(),
            'activeCount' => Company::where('status', true)->count(),
            'inactiveCount' => Company::where('status', false)->count(),
        ]);
    })->name('/');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::prefix('companies')->controller(AdminCompanyController::class)->group(function () {
        Route::get('/', 'index')->name('companies.index');
        Route::get('companies', 'create')->name('companies.create');
        Route::post('companies', 'store')->name('companies.store');
        Route::get('companies/{company}', 'edit')->name('companies.edit');
        Route::put('companies/{company}', 'update')->name('companies.update');
        Route::delete('companies/{company}', 'destroy')->name('companies.destroy');
    });
});
