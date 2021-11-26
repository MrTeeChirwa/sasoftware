<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeID',
        'firstName',
        'lastName',
        'contactNumber',
        'emailAddress',
        'streetAddress',
        'city',
        'postalCode',
        'country',
        'skills',
        'date',
    ];

    protected $data = [];
    protected $hidden = ['id'];

    public function storeOrUpdate($employee)
    {
        $this->data['employeeID'] = $employee['employeeID'];
        $this->data['firstName'] = $employee['firstName'];
        $this->data['lastName'] = $employee['lastName'];
        $this->data['contactNumber'] = $employee['contactNumber'];
        $this->data['emailAddress'] = $employee['emailAddress'];
        $this->data['streetAddress'] = $employee['streetAddress'];
        $this->data['city'] = $employee['city'];
        $this->data['postalCode'] = $employee['postalCode'];
        $this->data['country'] = $employee['country'];
        $this->data['date'] = Carbon::parse($employee['date'])->toDateTimeString();

        if (!empty($employee['skills'])) {
            $this->data['skills'] = serialize($employee['skills']);
        }

        return $this->updateOrCreate(
            ['employeeID' =>  $employee['employeeID'], 'emailAddress' => $employee['emailAddress']],
            $this->data,
        );
    }

    public function getEmployees()
    {
        return $this->get()->map(function ($employees) {
            $employees->skills = unserialize($employees->skills);
            return $employees;
        });
    }
}
