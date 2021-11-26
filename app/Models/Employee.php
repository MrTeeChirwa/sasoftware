<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function store($data)
    {
        $this->employeeID = $data['id'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->contactNumber = $data['contactNumber'];
        $this->emailAddress = $data['emailAddress'];
        $this->streetAddress = $data['streetAddress'];
        $this->city = $data['city'];
        $this->postalCode = $data['postalCode'];
        $this->country = $data['country'];

        if (!empty($data['skills'])) {
            $this->skills = serialize($data['skills']);
        }

        return $this->save();
    }
}
