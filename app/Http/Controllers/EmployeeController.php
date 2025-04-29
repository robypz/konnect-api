<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['user', 'department'])->cursorPaginate();
        return response()->json($employees, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->job = $request->job;
        $employee->department_id = $request->department_id;

        if ($request->hasFile('profile_photo')) {
            $employee->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $employee->save();

        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['user', 'department']);
        return response()->json($employee, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->user->name = $request->name;
        $employee->user->last_name = $request->last_name;
        $employee->user->email = $request->email;

        if ($request->filled('password')) {
            $employee->user->password = bcrypt($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            $employee->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $employee->job = $request->job;
        $employee->department_id = $request->department_id;

        $employee->user->save();
        $employee->save();

        return response()->json($employee, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->user->delete();
        $employee->delete();

        return response()->json(null, 204);
    }

    public function search($search){
        $employees = Employee::with(['user', 'department'])
            ->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            })
            ->orWhereHas('department', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->cursorPaginate();

        return response()->json($employees, 200);
    }
}
