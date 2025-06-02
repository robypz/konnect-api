<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->employee_id = $request->user()->employee->id;
        
        $comment->save();
        return response()->json($comment,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->content = $request->content;
        $comment->save();
        return response()->json($comment,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function byPost($postId){
        $comments = Comment::where('post_id',$postId)->cursorPaginate(25);
        return response()->json($comments,200);
    }
}
