<?php

namespace App\Repositories;

use App\Models\Employee;
use Carbon\Carbon;

class EmployeeRepository
{
    public function getAllEmployeePaginate($count = 10) {
        $data = Employee::paginate($count);
        return $data;
    }

    public function createEmployee($request) {
        $employee = Employee::Create(
            [
                'full_name' => $request->full_name,
                'birth_place' => $request->birth_place,
                'birth_date' => Carbon::parse($request->birth_date),
                'phone_number' => $request->phone_number,
                'department_id' => $request->department_id
            ]
        );
        return $employee;
    }

    public function updateEmployee($data, Employee $employee) {
        $employee->update([
            'full_name' => $data->full_name,
            'birth_place' => $data->birth_place,
            'birth_date' => Carbon::parse($data->birth_date),
            'phone_number' => $data->phone,
            'department_id' => $data->department_id,
            'position_id' => $data->position_id,
        ]);

        return $employee;
    }

    public function deleteEmployee(Employee $employee) {
        $isDeleted = $employee->delete();

        if($isDeleted) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
    }
}
