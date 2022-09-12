<?php

namespace App\Repositories;

use App\Models\Department;
use Carbon\Carbon;

class DepartmentRepository
{
    public function getAllDepartmentPaginate($count = 10) {
        $data = Department::paginate($count);
        return $data;
    }

    public function createDepartment($request) {
        $department = Department::updateOrCreate(
            [
                'department_name' => $request->department_name
            ]
        );
        return $department;
    }

    public function showDetailDepartment($id) {
        return Department::with('employees')->findOrFail($id);
    }

    public function updateDepartment($request, Department $department) {

        $isDepartmentNameAlreadyExist = $this->checkExistingDepartment($department->id, $request->department_name);
        if($isDepartmentNameAlreadyExist) {
            return response()->json([
                'status' => 422,
                'message' => 'Duplicate'
            ]);
        } else {
            $department->update([
                'department_name' => $request->department_name
            ]);
        }

        return $department;
    }

    public function deleteDepartment(Department $department) {

        $updateEmployee = $department->employees()->update([
            'department_id' => null
        ]);

        $isDeleted = $department->delete();

        if($isDeleted) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
    }

    private function checkExistingDepartment($id, $name) {
        $data = Department::where('id', '!=', $id)->where('department_name', $name)->first();
        if(isset($data)) {
            return true;
        } else {
            return false;
        }
    }
}
