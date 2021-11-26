<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EmployeeRequest;
use App\Http\UseCases\Employee\CreateEmployeeUseCase;

class EmployeeController extends Controller
{
    public function storeOrUpdate(EmployeeRequest $request, CreateEmployeeUseCase $usecase, Employee $employee)
    {
        return $usecase->handle($employee, $request->validated());
    }
}
