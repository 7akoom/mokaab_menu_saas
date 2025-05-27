@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="{{ route('company.settings.image.update', ['company' => app('currentCompany')->domain]) }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PUT')
            <div class="col-12">
                <h2 class="page-title">تعديل صورة نبذة عنا</h2>
                <div class="card shadow mb-4 mt-3">
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="example-fileinput">الصورة</label>
                
                                    @if($setting->image && $setting->image->path)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $setting->image->path) }}" alt="Logo" width="1000" height="300"
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