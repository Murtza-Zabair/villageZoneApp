<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MessageController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('admin'),
        ];
    }

    public function index()
    {
        $messages = Message::latest()->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        // Mark message as read if it hasn't been read yet
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'reply' => 'required|string'
        ]);

        // You might want to send an email or store the reply
        // This is just a basic implementation
        $message->update([
            'admin_reply' => $request->reply,
            'replied_at' => now(),
            'is_read' => true
        ]);

        return redirect()->route('admin.messages.show', $message)
            ->with('success', 'Reply sent successfully.');
    }
}
