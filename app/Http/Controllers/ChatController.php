<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chat\StoreChatRequest;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        $chat = new Chat();
        $chat->type = $request->type;
        $chat->save();
        $chat->employees()->attach(auth()->user()->employee->id);
        foreach ($request->employees as $employee){
            $chat->employees()->attach($employee['id']);
        }

        return response()->json($chat,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {

    }

    public function byEmployee(){
        $chats = auth()->user()->employee->chats;
        $chats->load('employees.user');
        return response()->json($chats,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
