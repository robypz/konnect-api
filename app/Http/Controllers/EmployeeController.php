<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Spatie\Image\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['department', 'user'])->cursorPaginate();
        return response()->json($employees, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        /*$user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->job = $request->job;
        $employee->department_id = $request->department_id;*/

        if ($request->hasFile('profile_photo')) {
            // Store original photo
            $storagePath = $request->file('profile_photo')->store('profile_photos', 'public');

            // create a image with 32x32 size and save it with tha actual name in storage + '-32w'
            $image = Image::load(storage_path('app/public/' . $storagePath));
            $image->width(32)->height(32)->save(storage_path('app/public/profile_photos/' . pathinfo($storagePath, PATHINFO_FILENAME) . '-32w.' . pathinfo($storagePath, PATHINFO_EXTENSION)));

            // create a image with 64x64 size and save it with tha actual name in storage + '-64w'
            $image = Image::load(storage_path('app/public/' . $storagePath));
            $image->width(64)->height(64)->save(storage_path('app/public/profile_photos/' . pathinfo($storagePath, PATHINFO_FILENAME) . '-64w.' . pathinfo($storagePath, PATHINFO_EXTENSION)));

            // create a image with 128x128 size and save it with tha actual name in storage + '-128w'
            $image = Image::load(storage_path('app/public/' . $storagePath));
            $image->width(128)->height(128)->save(storage_path('app/public/profile_photos/' . pathinfo($storagePath, PATHINFO_FILENAME) . '-128w.' . pathinfo($storagePath, PATHINFO_EXTENSION)));
        }

        /*$employee->save();

        $employee->load(['user', 'department']);*/

        return response()->json(null, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['projects']);
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

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:3'
        ]);

        $search = $request->input('search');
        $employees = Employee::with(['user', 'department'])
            ->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            })
            ->cursorPaginate();

        return response()->json($employees, 200);
    }

    public function tasks(Employee $employee)
    {
        return response()->json($employee->tasks, 200);
    }

    public function posts(Employee $employee)
    {
        return response()->json($employee->posts, 200);
    }

    public function events(Employee $employee)
    {
        return response()->json($employee->events, 200);
    }

    public function projects(Employee $employee)
    {
        return response()->json($employee->projects, 200);
    }
}
