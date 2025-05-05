<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminSupportController extends Controller
{
    public function index(Request $request)
    {

    }

    public function users()
    {
        $admin = Auth::guard('admin')->user();

        // کاربرانی که پیام خوانده نشده دارند
        $usersWithUnread = User::whereHas('receivedMessages', function($query) use ($admin) {
            $query->where('receiver_id', $admin->id)
                ->where('receiver_model', 'App\Models\Admin')
                ->where('status',0);
        })
            ->where('type','user')
            ->with(['lastMessage','people'])
            ->get()
            ->map(function($user) {
                $user->unread_count = $user->receivedMessages()
                    ->where('status',0)
                    ->count();
                return $user;
            });

        // سایر کاربران
        $otherUsers = User::whereDoesntHave('receivedMessages', function($query) use ($admin) {
            $query->where('receiver_id', $admin->id)
                ->where('receiver_model', 'App\Models\Admin')
                ->where('status',0);
        })
            ->where('type','user')
            ->with(['lastMessage','people'])
            ->get()
            ->map(function($user) {
                $user->unread_count = 0;
                return $user;
            });

        return response()->json([
            'users_with_unread' => $usersWithUnread,
            'other_users' => $otherUsers,
        ]);
    }

    public function messages(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'last_message_id' => 'nullable|integer',
        ]);

        $admin = Auth::guard('admin')->user();
        $userId = $request->user_id;

        $messages = Message::where('type', 'UserSupport')
            ->where('id', '>', $request->input('last_message_id', 0))
            ->where(function($query) use ($admin, $userId) {
                $query->where(function($q) use ($admin, $userId) {
                    $q->where('receiver_id', $userId)
                        ->where('receiver_model', 'App\Models\User');
                })->orWhere(function($q) use ($admin, $userId) {
                    $q->where('sender_id', $userId)
                        ->where('sender_model', 'App\Models\User');
                });
            })
            ->orderBy('created_at', 'asc')
            ->get();
        // علامت گذاری پیام‌ها به عنوان خوانده شده
        if ($messages->isNotEmpty()) {
            Message::where('sender_id', $userId)
                ->where('sender_model', 'App\Models\User')
                ->where('status',0)
                ->update(['status' => 1,'receiver_id' => $admin->id]);
        }

        return response()->json([
            'messages' => $messages,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $admin = Auth::guard('admin')->user();

        $message = Message::create([
            'sender_id' => $admin->id,
            'sender_model' => 'App\Models\User',
            'receiver_id' => $request->user_id,
            'receiver_model' => 'App\Models\User',
            'text' => $request->message,
            'type' => 'UserSupport',
            'status' => 0
        ]);

        return response()->json(['success' => true]);
    }
}
