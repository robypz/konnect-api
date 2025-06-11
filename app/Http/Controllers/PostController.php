<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Reaction;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['employee.user', 'project', 'comments', 'reactions'])->cursorPaginate(10);
        return response()->json($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->employee_id = $request->user()->employee->id;
        $post->project_id = $request->input('project_id');

        // Handle media files if any
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $post->media[] = [
                    'path' => $file->store('posts', 'public'),
                    'type' => $file->getClientMimeType(),
                ];
            }
        }

        $post->save();

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['employee', 'comments', 'reactions']);
        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->content = $request->input('content');

        // Handle media files if any
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $post->media[] = [
                    'path' => $file->store('posts', 'public'),
                    'type' => $file->getClientMimeType(),
                ];
            }
        }

        $post->save();

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }

    public function react(Request $request, Post $post)
    {

        $reaction = $post->reactions()->where('type', $request->type)->where('employee_id', $request->user()->employee->id)->first();

        if ($reaction) {
            $post->reactions()->detach($reaction);
        } else {
            $reaction = new Reaction();
            $reaction->type = $request->type;
            $reaction->employee_id = $request->user()->employee->id;
            $reaction = $post->reactions()->attach($reaction);
        }

        return response()->json($reaction, 200);
    }
}
