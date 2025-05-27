@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="{{ route('company.products.update', ['company' => app('currentCompany')->domain, 'product' => $product->id]) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-12">
                <h2 class="page-title">تعديل منتج</h2>

                <div class="card shadow mb-4 mt-3">
                    <div class="card-header">
                        <strong class="card-title">معلومات المنتج</strong>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            {{-- الاسم --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">الاسم</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- السعر --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="price">السعر</label>
                                    <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- الخصم --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="discount">الخصم</label>
                                    <input type="text" id="discount" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $product->discount) }}">
                                    @error('discount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- الكمية --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="qty">الكمية</label>
                                    <input type="text" id="qty" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', $product->qty) }}">
                                    @error('qty')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- القياس --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="size">القياس</label>
                                    <input type="text" id="size" name="size" class="form-control @error('size') is-invalid @enderror" value="{{ old('size', $product->size) }}">
                                    @error('size')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- الأبعاد --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="dimention">الأبعاد</label>
                                    <input type="text" id="dimention" name="dimention" class="form-control @error('dimention') is-invalid @enderror" value="{{ old('dimention', $product->dimention) }}">
                                    @error('dimention')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- النوع --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="type">النوع</label>
                                    <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type', $product->type) }}">
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- المنشأ --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="manufacture">المنشأ</label>
                                    <input type="text" id="manufacture" name="manufacture" class="form-control @error('manufacture') is-invalid @enderror" value="{{ old('manufacture', $product->manufacture) }}">
                                    @error('manufacture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- التوصيل --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="delivery">التوصيل</label>
                                    <input type="text" id="delivery" name="delivery" class="form-control @error('delivery') is-invalid @enderror" value="{{ old('delivery', $product->delivery) }}">
                                    @error('delivery')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- اللون --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="color">اللون</label>
                                    <input type="text" id="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $product->color) }}">
                                    @error('color')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- الوصف --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description">الوصف</label>
                                    <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- الفئة --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id">الفئة</label>
                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">-- اختر الفئة --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- الصور الحالية مع زر حذف --}}
                            <div class="col-md-12 mb-3">
                                <label>الصور الحالية:</label>
                                <div class="row">
                                    @foreach($product->images as $img)
                                        <div class="col-md-3 mb-3 position-relative">
                                            <img src="{{ asset('storage/' . $img->path) }}" class="rounded border w-100" style="height:150px; object-fit:cover;">
                                            {{-- <form action="{{ route('company.products.image.delete', ['company' => app('currentCompany')->domain, 'image' => $img->id]) }}" method="POST" class="position-absolute" style="top:5px; right:5px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">x</button>
                                            </form> --}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- رفع صور جديدة --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="images">صور جديدة (بحد أقصى 4)</label>
                                    <input type="file" id="images" name="images[]" multiple accept="image/*" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror">
                                    @error('images')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @error('images.*')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <button class="btn bg-gradient-primary" type="submit">حفظ التعديلات</button>
            </div>
        </form>
    </div>
</div>

@endsection
