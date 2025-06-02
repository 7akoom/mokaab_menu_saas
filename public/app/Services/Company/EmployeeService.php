<?php

namespace App\Services\Company;

use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeService
{
    public function store(array $data, $imageFile, int $companyId): Employee
    {
        $employee = Employee::create([
            'company_id' => $companyId,
            'name' => $data['name'],
            'position' => $data['position'],
            'description' => $data['description'],
        ]);

        if ($imageFile) {
            $path = $imageFile->store('employees', 'public');
            $employee->image()->create([
                'company_id' => $companyId,
                'path' => $path,
            ]);
        }

        return $employee;
    }

    public function update(Employee $employee, array $data, $imageFile, int $companyId): void
    {
        $employee->update([
            'name' => $data['name'],
            'position' => $data['position'],
            'description' => $data['description'],
        ]);

        if ($imageFile) {
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image->path);
                $employee->image()->delete();
            }

            $path = $imageFile->store('employees', 'public');
            $employee->image()->create([
                'company_id' => $companyId,
                'path' => $path,
            ]);
        }
    }

    public function delete(Employee $employee): void
    {
        if ($employee->image) {
            Storage::disk('public')->delete($employee->image->path);
            $employee->image()->delete();
        }

        $employee->delete();
    }
}
