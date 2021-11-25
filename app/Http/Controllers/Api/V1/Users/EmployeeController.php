<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(EmployeeRequest $request)
    {
        $json = [];
        $json['status'] = true;
        $json['data'] = $request->all();

        return $json;
    }
}
