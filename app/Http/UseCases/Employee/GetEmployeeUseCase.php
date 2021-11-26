<?php

namespace App\Http\UseCases\Employee;

use App\Models\Employee;

class GetEmployeeUseCase
{
    public function handle(Employee $employee)
    {
        $employees = $employee->getEmployees();

        return $employees;
    }
}
