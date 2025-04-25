<?php

namespace App\Http\Controllers;

use App\Models\Department;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deparments = Department::all();
        return response()->json($deparments,200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $deparment = Department::create($request->validated());
        return response()->json($deparment,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $deparment)
    {
        return response()->json($deparment,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $deparment)
    {
        $deparment->update($request->validated());
        return response()->json($deparment,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $deparment)
    {
        $deparment->delete();
        return response()->json(null,204);
    }
}
