<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class IdentifyCompany
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0];

        $company = Company::where('domain', $subdomain)->with('logo')->first();

        if (! $company) {
            abort(404, 'الشركة غير موجودة.');
        }

        app()->instance('currentCompany', $company);

        return $next($request);
    }
}
