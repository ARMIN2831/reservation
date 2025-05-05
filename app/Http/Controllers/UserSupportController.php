<?php

namespace App\Http\Controllers;



use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class UserSupportController extends Controller
{
    public function getMessages(Request $request)
    {
        $user = Auth::guard('user')->user();
        if ($user){
            $conversation = Message::where('id', '>', $request->input('last_message_id', 0))
                ->where('type', 'UserSupport')
                ->where(function($query) use ($user) {
                    $query->where(function($q) use ($user) {
                        $q->where('sender_id', $user->id)
                            ->where('sender_model', 'App\Models\User');
                    })->orWhere(function($q) use ($user) {
                        $q->where('receiver_id', $user->id)
                            ->where('receiver_model', 'App\Models\User');
                    });
                })
                ->orderBy('created_at', 'asc')
                ->get();

            $unreadCount = Message::where('receiver_id', $user->id)
                ->where('receiver_model','App\Models\User')
                ->where('type', 'UserSupport')
                ->where('status', 0)
                ->count();
            return response()->json([
                'messages' => $conversation,
                'unread' => $unreadCount,
            ]);
        }
        return response()->json([
            'message' => 'Unauthenticated'
        ],401);
    }


    public function readMessages()
    {
        $user = Auth::guard('user')->user();
        if ($user){
            Message::where('receiver_id', $user->id)->where('receiver_model','App\Models\User')->update(['status' => 1]);
            return response()->json([
                'message' => 'done',
            ]);
        }
        return response()->json([
            'message' => 'Unauthenticated'
        ],401);
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::guard('user')->user();
        if ($user){
            $request->validate(['message' => 'required|string']);

            $message = Message::create([
                'sender_id' => $user->id,
                'sender_model' => 'App\Models\User',
                'type' => 'UserSupport',
                'receiver_model' => 'App\Models\User',
                'status' => 0,
                'text' => $request->message,
            ]);
            return response()->json($message);
        }
        return response()->json([
            'message' => 'Unauthenticated'
        ],401);
    }
}
