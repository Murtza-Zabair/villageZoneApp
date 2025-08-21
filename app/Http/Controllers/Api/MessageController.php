<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public static function middleware(): array
    {
        return [
            new \Illuminate\Routing\Controllers\Middleware('auth:sanctum', except: ['store']),
        ];
    }

    public function index(Request $request)
    {
        $messages = $request->user()
            ->messages()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $message = Message::create([
            'user_id' => $request->user()?->id, 
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status'  => 'unread',
        ]);

        return response()->json([
            'message' => 'Message sent successfully',
            'data'    => $message,
        ], 201);
    }

    public function show(Request $request, Message $message)
    {
        if ($message->user_id !== $request->user()?->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($message);
    }
}
