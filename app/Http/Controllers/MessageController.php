<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessage;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Models\Message;
use App\Notifications\MessageNotification;
use Illuminate\Http\Request;

class MessageController extends Controller
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
    public function store(StoreMessageRequest $request)
    {
        $message = new Message();
        $message->content = $request->content;
        $message->employee_id = $request->employee_id;
        $message->chat_id = $request->chat_id;
        $message->save();

        foreach ($message->chat->employees as $employee) {
            if ($employee->id != $message->employee_id) {
               $employee->user->notify(new MessageNotification($message));
            }
        }

        return response()->json($message,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }

    public function byChat($chatId)
    {
        $messages = Message::where('chat_id',$chatId)->cursorPaginate();
        return response()->json($messages,200);
    }
}
