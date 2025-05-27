@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="{{ route('company.settings.update', ['company' => app('currentCompany')->domain]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="password_present" value="1">
            <div class="col-12">
                <h2 class="page-title">تعديل معلوماتي</h2>
                <div class="card shadow mb-4 mt-3">
                    <div class="card-header">
                        <strong class="card-title">معلومات تسجيل الدخول</strong>
                    </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name">الاسم</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $setting->name) }}" readonly>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="email">الإيميل</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $setting->email) }}" readonly>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="phone">رقم الهاتف</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $setting->phone) }}" readonly>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="start_date">تاريخ بدء الاشتراك</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" readonly
                                        value="{{ old('start_date', \Carbon\Carbon::parse($setting->start_date)->format('Y-m-d')) }}">
                                    @error('start_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="start_date">تاريخ انتهاء الاشتراك</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" readonly
                                        value="{{ old('start_date', \Carbon\Carbon::parse($setting->expire_date)->format('Y-m-d')) }}">
                                    @error('start_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <hr>
                        <div class="card-header">
                            <strong class="card-title">معلومات البروفايل</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email">الإيميل</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $setting->settings->email) }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone_1"> رقم الهاتف الأول</label>
                                        <input type="text" id="phone_1" name="phone_1" class="form-control" value="{{ old('phone_1', $setting->settings->phone_1) }}">
                                        @error('phone_1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address_1">العنوان الأول</label>
                                        <input type="text" id="address_1" name="address_1" class="form-control" value="{{ old('address_1', $setting->settings->address_1) }}">
                                        @error('address_1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="facebook_url">رابط الفيسبوك</label>
                                        <input type="text" id="facebook_url" name="facebook_url" class="form-control" value="{{ old('facebook_url', $setting->settings->facebook_url) }}">
                                        @error('facebook_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="example-password">كلمة المرور (اتركه فارغاً إذا لا تريد تغييره)</label>
                                        <input type="password" id="example-password" name="password" class="form-control">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone_2"> رقم الهاتف الثاني</label>
                                        <input type="text" id="phone_2" name="phone_2" class="form-control" value="{{ old('phone_2', $setting->settings->phone_2) }}">
                                        @error('phone_2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address_2">العنوان الثاني</label>
                                        <input type="text" id="address_2" name="address_2" class="form-control" value="{{ old('address_2', $setting->settings->address_2) }}">
                                        @error('address_2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="instagram_url">رابط الانستغرام</label>
                                        <input type="text" id="instagram_url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $setting->settings->instagram_url) }}">
                                        @error('instagram_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="theme">اختر الثيم</label>
                                        <select name="theme" id="theme" class="custom form-select">
                                            @foreach ($themes as $theme)
                                                <option value="{{ $theme->value }}" {{ old('theme', $setting->settings->theme) === $theme->value ? 'selected' : '' }}>
                                                    {{ $theme->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('theme')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="primary_color">اللون الأساسي</label>
                                        <input type="color" name="primary_color" value="{{ old('primary_color', $setting->settings->primary_color) }}" class="form-control" id="primary-color">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="logo">اللوغو</label>         
                                        <input type="file" id="logo" name="logo" class="form-control">
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($setting->logo && $setting->logo->path)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $setting->logo->path) }}" alt="Logo" width="80" height="80"
                                                    class="rounded border p-1 bg-white shadow-sm">
                                            </div>
                                        @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="about_us">نبذة عنا</label>
                                        <textarea name="about_us" class="form-control" id="about_us" rows="4">{{ old('about_us', $setting->settings->about_us) }}</textarea>
                                        @error('about_us')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
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