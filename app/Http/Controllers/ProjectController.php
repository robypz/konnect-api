<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->deadline = $request->deadline;
        $project->progress = $request->progress;
        //$project->department_id = $request->department_id;
        $project->category_id = $request->category_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->status_id = $request->status_id;
        $project->save();
        if ($request->has('employees')) {
            foreach ($request->employees as $employee) {
                $project->employees()->attach($employee['id']);
            }
        }

        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return response()->json($project, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->name = $request->name;
        $project->description = $request->description;
        $project->deadline = $request->deadline;
        $project->progress = $request->progress;
        //$project->department_id = $request->department_id;
        $project->category_id = $request->category_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->status_id = $request->status_id;
        $project->save();

        if ($request->has('employees')) {
            $project->employees()->detach();
            foreach ($request->employees as $employee) {
                $project->employees()->attach($employee['id']);
            }
        }

        return response()->json($project, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->employees()->detach();
        $project->tasks()->delete();
        $project->posts()->comments()->delete();
        $project->posts()->delete();
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully'], 200);
    }
}
