<?php

namespace App\Http\Controllers\StudentsArea\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Repositories\All\Chats\ChatsInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentChatController extends Controller
{
    public function __construct(
        protected ChatsInterface $chatsInterface,

    ) {
    }
    public function index()
    {
        $user = auth()->user();
        // $chats = $user->chats()->with('teacher.user')->get();

        $chats = $this->chatsInterface->getStudentChats();
    
        return Inertia::render('StudentArea/Chat/All/Index', [
            'chats' => $chats,
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {

     
        return Inertia::render('StudentArea/Chat/All/Chat', [
            'message' => $message,
        ]);
    }
 
    public function getMessages($chatId)
    {
        $messages = Chat::find($chatId)->messages()->get();
        return response()->json($messages);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
