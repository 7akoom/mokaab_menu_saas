@extends('layout')

@section('content')

<div class="container-fluid py-4">

    <div class="container-fluid py-4">
        <a href="{{ route('company.products.create', ['company' => app('currentCompany')->domain]) }}" class="btn bg-gradient-primary submit" id="create">إضافة</a>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>قائمة المنتجات</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الاسم</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الفئة</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">السعر</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الكمية</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $product->category?->name ?? '-' }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $product->price }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $product->qty }}</h6>
                                            </td>
                                            <td>
                                                <a href="{{ route('company.products.edit', ['product' => $product->id, 'company' => app('currentCompany')->domain]) }}"
                                                   class="text-secondary font-weight-bold me-3">
                                                    تعديل
                                                </a>
                                                <a href="" class="text-danger font-weight-bold me-3"
                                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">
                                                    حذف
                                                </a>
                                                <form id="delete-form-{{ $product->id }}"
                                                      action="{{ route('company.products.destroy', ['product' => $product->id, 'company' => app('currentCompany')->domain]) }}"
                                                      method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
