<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    protected $data = [];

    public function storeOrUpdate($employee)
    {
        $this->data['employeeID'] = $employee['id'];
        $this->data['firstName'] = $employee['firstName'];
        $this->data['lastName'] = $employee['lastName'];
        $this->data['contactNumber'] = $employee['contactNumber'];
        $this->data['emailAddress'] = $employee['emailAddress'];
        $this->data['streetAddress'] = $employee['streetAddress'];
        $this->data['city'] = $employee['city'];
        $this->data['postalCode'] = $employee['postalCode'];
        $this->data['country'] = $employee['country'];

        if (!empty($employee['skills'])) {
            $this->data['skills'] = serialize($employee['skills']);
        }

        return $this->updateOrCreate(
            ['employeeID' =>  $employee['id'], 'emailAddress' => $employee['emailAddress']],
            $this->data,
        );
    }
}
