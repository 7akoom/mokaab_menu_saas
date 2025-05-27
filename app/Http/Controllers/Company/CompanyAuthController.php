<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('company.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $company = app('currentCompany');

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $matched = Company::where('id', $company->id)
            ->where('email', $credentials['email'])
            ->first();

        if (!$matched || !Hash::check($credentials['password'], $matched->password)) {
            return back()->withErrors(['email' => 'بيانات الدخول غير صحيحة']);
        }

        if (!$matched->status) {
            return back()->withErrors(['email' => 'هذا الحساب غير مفعل. يرجى تجديد الاشتراك لتتمكن من تسجيل الدخول.']);
        }

        Auth::guard('company')->login($matched);

        return redirect()->route('company.settings.index', ['company' => $company->domain]);
    }

    public function logout(Request $request)
    {
        $company = app('currentCompany');
        Auth::guard('company')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('company.login', ['company' => $company->domain]);
    }
}
