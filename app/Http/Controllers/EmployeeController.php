<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct(EmployeeRepository $employeeRepository, MediaRepository $mediaRepository)
    {
        $this->repo = $employeeRepository;
        $this->mediaRepo = $mediaRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repo->getAllEmployeePaginate();
        return EmployeeResource::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = $this->repo->createEmployee($request);

        return $employee;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = json_decode(json_encode($request->data), FALSE);
        return $this->repo->updateEmployee($data, $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        return $this->repo->deleteEmployee($employee);
    }

    public function uploadMedia(Employee $employee, Request $request)
    {
        return $this->mediaRepo->saveFile($employee, $request);
    }
}
