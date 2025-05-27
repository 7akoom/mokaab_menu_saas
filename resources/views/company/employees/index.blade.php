@extends('layout')

@section('content')

<div class="container-fluid py-4">

    <div class="container-fluid py-4">
        <a href="{{route('company.employees.create',['company' => app('currentCompany')->domain])}}" class="btn bg-gradient-primary submit" id="create">إضافة</a>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>قائمة الموظفين</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الصورة</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الاسم</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المنصب</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الوصف</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $emp)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if ($emp->image && $emp->image->path)
                                                        <img src="{{ asset('storage/' . $emp->image->path) }}" alt="Logo" width="50" height="50" class="rounded-circle border border-2 border-primary shadow-sm">
                                                    @else
                                                        <img src="{{ asset('assets/img/small-logos/logo-jira.svg') }}" alt="No Logo" width="50" height="50" class="rounded-circle border border-2 border-primary shadow-sm">
                                                    @endif
    
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                                <h6 class="mb-0 text-sm">{{$emp->name}}</h6>
                                        </td>
                                        <td>
                                                <h6 class="mb-0 text-sm">{{$emp->position}}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{$emp->description}}</h6>
                                        </td>
                                        <td>
                                            <a href="{{ route('company.employees.edit', ['employee' => $emp->id,'company' => app('currentCompany')->domain]) }}"
                                            class="text-secondary font-weight-bold me-4">
                                                تعديل
                                            </a>
                                            <a href="" class="text-danger font-weight-bold me-4"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $emp->id }}').submit();">
                                                حذف
                                            </a>
                                            <form id="delete-form-{{ $emp->id }}" 
                                                action="{{ route('company.employees.destroy', ['employee' =>$emp->id,'company' => app('currentCompany')->domain]) }}" 
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
