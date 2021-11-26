<?php

namespace App\Http\UseCases\Employee;

use App\Models\Employee;

class CreateEmployeeUseCase
{
    public function handle(Employee $employee, array $data)
    {
        $status = $employee->storeOrUpdate($data);

        $json = [];

        if ($status) {
            $json['status'] = $status;
            $json['data'] = $data;
        }

        return $json;
    }
}
