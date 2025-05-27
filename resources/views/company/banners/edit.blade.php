@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="{{route('company.banner.update', ['company' => app('currentCompany')->domain])}}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PUT')
            <div class="col-12">
                <h2 class="page-title">تعديل البانر</h2>
                <div class="card shadow mb-4 mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title">العنوان</label>
                                    <input type="text" id="title" name="title" class="form-control @error('name') is-invalid @enderror"value="{{ old('title', $banner->title) }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="main_text">النص الأساسي</label>
                                    <input type="text" id="main_text" name="main_text" class="form-control @error('main_text') is-invalid @enderror"value="{{ old('main_text', $banner->main_text) }}">
                                    @error('main_text')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="sub_text">النص الفرعي</label>
                                    <input type="text" id="sub_text" name="sub_text" class="form-control @error('sub_text') is-invalid @enderror"value="{{ old('sub_text', $banner->sub_text) }}">
                                    @error('sub_text')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="example-fileinput">الصورة</label>
                
                                    @if($banner->image && $banner->image->path)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $banner->image->path) }}" alt="Logo" width="1000" height="300"
                                                class="rounded border p-1 bg-white shadow-sm">
                                        </div>
                                    @endif

                                    <input type="file" id="example-fileinput" name="image" class="form-control">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn bg-gradient-primary" type="submit">حفظ</button>
            </div>
        </form>
    </div>
</div>

@endsection