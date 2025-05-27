@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="{{route('company.categories.store',['company' => app('currentCompany')->domain])}}" 
        method="POST">
        @csrf
            <div class="col-12">
                <h2 class="page-title">إضافة فئة</h2>
                <div class="card shadow mb-4 mt-3">
                    <div class="card-header">
                        <strong class="card-title">معلومات الفئة</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">الاسم</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="سيراميك" value="{{ old('name') }}">
                                    @error('name')
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