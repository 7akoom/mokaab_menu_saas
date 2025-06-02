<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureCompanyIsActive
{
    public function handle(Request $request, Closure $next)
    {
        $company = app('currentCompany');

        // إذا كانت الشركة غير فعالة يتم منعه من أي صفحة عدا not-found
        if (!$company || !$company->status) {
            if ($request->route()->getName() !== 'not-found') {
                return redirect()->route('not-found', ['company' => $company?->domain]);
            }
        }

        // إذا كانت الشركة فعالة وتحاول الدخول إلى صفحة not-found يتم منعه
        if ($company && $company->status && $request->route()->getName() === 'not-found') {
            return redirect()->route('company.public', ['company' => $company->domain]);
        }

        return $next($request);
    }
}
