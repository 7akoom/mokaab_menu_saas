<?php

namespace App\Http\Controllers\Company;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Services\Company\EmployeeService;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeService $employeeService) {}

    public function index()
    {
        $employees = Employee::where('company_id', app('currentCompany')->id)
            ->with('image')->get();
        return view('company.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('company.employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $companyId = app('currentCompany')->id;

        $this->employeeService->store(
            $request->only('name', 'position', 'description'),
            $request->file('image'),
            $companyId
        );

        return redirect()->route('company.employees.index', ['company' => app('currentCompany')->domain])
            ->with('success', 'تمت إضافة الموظف');
    }

    public function edit($domain, Employee $employee)
    {
        return view('company.employees.edit', compact('employee'));
    }

    public function update($domain, UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->employeeService->update(
            $employee,
            $request->only('name', 'position', 'description'),
            $request->file('image'),
            auth('company')->id()
        );

        return redirect()->route('company.employees.index', ['company' => $domain])
            ->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($domain, Employee $employee)
    {
        $this->employeeService->delete($employee);

        return back()->with('success', 'تم حذف الموظف');
    }
}
