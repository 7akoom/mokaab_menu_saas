@extends('layout')

@section('content')

<div class="container-fluid py-4">

    <div class="container-fluid py-4">
        <a href="{{route('company.categories.create',['company' => app('currentCompany')->domain])}}" class="btn bg-gradient-primary submit" id="create">إضافة</a>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>قائمة الفئات</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الاسم</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ الإنشاء</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاريخ التعديل</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $cat)
                                    <tr>
                                        <td>
                                                <h6 class="mb-0 text-sm me-3">{{$cat->name}}</h6>
                                        </td>
                                        <td>
                                                <h6 class="mb-0 text-sm">{{$cat->created_at}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{$cat->updated_at}}</h6>
                                        </td>
                                        <td>
                                            <a href="{{ route('company.categories.edit', ['category' => $cat->id,'company' => app('currentCompany')->domain]) }}"
                                            class="text-secondary font-weight-bold me-4">
                                                تعديل
                                            </a>
                                            <a href="" class="text-danger font-weight-bold me-4"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $cat->id }}').submit();">
                                                حذف
                                            </a>
                                            <form id="delete-form-{{ $cat->id }}" 
                                                action="{{ route('company.categories.destroy', ['category' =>$cat->id,'company' => app('currentCompany')->domain]) }}" 
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
