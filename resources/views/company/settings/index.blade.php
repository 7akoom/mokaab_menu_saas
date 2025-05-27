@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @if ($setting->logo && $setting->logo->path)
            <img src="{{ asset('storage/' . $setting->logo->path) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @else
            <img src="{{ asset('assets/img/small-logos/logo-jira.svg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @endif
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{$setting->name}}
            </h5>
            <a href="{{ route('company.public', ['company' => $setting->domain]) }}" target="_blank" class="mb-0 font-weight-bold text-sm text-decoration-underline">
                {{$setting->domain}}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-xl-12">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-1 d-flex align-items-center">
                <h6 class="mb-0">معلوماتي</h6>
              </div>
              <div class="col-md-3 text-start">
                <a href="{{ route('company.settings.edit', ['company' => app('currentCompany')->domain]) }}">
                    تعديل
                </a>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <p class="text-sm">
              {{$setting->settings->about_us ?? 'قم بكتابة نبذة عنك في صفحة الضبط لتظهر معلوماتك'}}
            </p>
            <hr class="horizontal gray-light my-4">
            <ul class="list-group">
              <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">الثيم المستخدم:</strong> &nbsp; {{$setting->settings->theme}}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">رقم الهاتف 1:</strong> &nbsp; {{$setting->settings->phone_1 ?? 'لا يوجد'}}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">رقم الهاتف 2:</strong> &nbsp; {{$setting->settings->phone_2 ?? 'لا يوجد'}}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">البريد الإلكتروني:</strong> &nbsp; {{$setting->settings->email ?? 'لا يوجد'}}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">العنوان 1:</strong> &nbsp; {{$setting->settings->address_1 ?? 'لا يوجد'}}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">العنوان 2:</strong> &nbsp; {{$setting->settings->address_2 ?? 'لا يوجد'}}</li>
              @if($setting->settings->facebook_url || $setting->settings->instagram_url)
                <li class="list-group-item border-0 ps-0 pb-0">
                  <strong class="text-dark text-sm">سوشال ميديا:</strong> &nbsp;
                    @if($setting->settings->facebook_url)
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $setting->settings->facebook_url }}" target="_blank">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                    @endif
                    @if($setting->settings->instagram_url)
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="{{ $setting->settings->instagram_url }}" target="_blank">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                    @endif
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection