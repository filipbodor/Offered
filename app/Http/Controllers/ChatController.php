<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    public function loadChatInterface(Request $request)
    {
        $toUserId = $request->input('user_id');
        $user = User::find($toUserId);
        $authUserId = auth()->id();

        // Retrieve past messages from the database
        $messages = Message::where(function ($query) use ($authUserId, $toUserId) {
            $query->where('from_user_id', $authUserId)
                ->where('to_user_id', $toUserId);
        })->orWhere(function ($query) use ($authUserId, $toUserId) {
            $query->where('from_user_id', $toUserId)
                ->where('to_user_id', $authUserId);
        })->orderBy('created_at', 'asc')->get();

        return view('include.chat.include.chat_interface', compact('user', 'messages', 'toUserId'));
    }

    public function storeMessage(Request $request)
    {
        // Validate the request data as needed
        $validatedData = $request->validate([
            'message' => 'required|string',
            'to_user_id' => 'required|exists:users,id',
        ]);

        // Create and store the message
        $message = Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $validatedData['to_user_id'],
            'content' => $validatedData['message']
        ]);


        return response()->json(['status' => 'Message stored successfully', 'message' => $message]);

    }

    public static function getUserList($currentUserId)
    {

        $users = User::whereHas('sentMessages', function ($query) use ($currentUserId) {
            $query->where('to_user_id', $currentUserId);
        })->orWhereHas('receivedMessages', function ($query) use ($currentUserId) {
            $query->where('from_user_id', $currentUserId);
        })->get();

        return $users;
    }
}
