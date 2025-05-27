@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="{{route('company.employees.store',['company' => app('currentCompany')->domain])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <h2 class="page-title">إضافة الموظف</h2>
                <div class="card shadow mb-4 mt-3">
                    <div class="card-header">
                        <strong class="card-title">معلومات الموظف</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">الاسم</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">المنصب</label>
                                    <input type="text" id="position" name="position" class="form-control">
                                    @error('position')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="example-fileinput">الصورة</label>
                                    <input type="file" id="example-fileinput" name="image" class="form-control">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div> 
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="description">الوصف</label>
                                    <textarea name="description" class="form-control" id="description" rows="5"></textarea>
                                    @error('description')
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
