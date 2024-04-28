<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class ChatController extends Controller
{
    public function loadChatInterface(Request $request)
    {
        $toUserId = $request->input('user_id');
        $advertisementId = $request->input('advertisement_id'); // New: Get advertisement_id from request
        $user = User::find($toUserId);
        $advertisement = Advertisement::find($advertisementId);
        $authUserId = auth()->id();
        \Log::info($advertisement);
        // Retrieve past messages from the database
        $messages = Message::where(function ($query) use ($authUserId, $toUserId, $advertisementId) {
            $query->where('from_user_id', $authUserId)
                ->where('to_user_id', $toUserId)
                ->where('advertisement_id', $advertisementId); // Filter by advertisement_id
        })->orWhere(function ($query) use ($authUserId, $toUserId, $advertisementId) {
            $query->where('from_user_id', $toUserId)
                ->where('to_user_id', $authUserId)
                ->where('advertisement_id', $advertisementId); // Filter by advertisement_id
        })->orderBy('created_at', 'asc')->get();

        return view('include.chat.include.chat_interface', compact('user', 'messages', 'toUserId', 'advertisement', 'advertisementId'));
    }

    public function storeMessage(Request $request)
    {
        \Log::info($request);

        // Validate the request data as needed
        $validatedData = $request->validate([
            'message' => 'required|string',
            'to_user_id' => 'required|exists:users,id',
            'advertisement_id' => 'required|exists:advertisements,id', // New: Validate advertisement_id
        ]);

        // Create and store the message
        $message = Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $validatedData['to_user_id'],
            'advertisement_id' => $validatedData['advertisement_id'], // New: Store advertisement_id
            'content' => $validatedData['message']
        ]);

        return response()->json(['status' => 'Message stored successfully', 'message' => $message]);
    }

    public static function getUserList($currentUserId)
    {
        // Get all messages where the current user is either the sender or receiver
        $messages = Message::where('from_user_id', $currentUserId)
            ->orWhere('to_user_id', $currentUserId)
            ->orderBy('created_at', 'desc') // Order messages by creation time in descending order
            ->get();

        // Initialize an empty array to store user-advertisement pairs
        $userAdvertisements = [];

        // Iterate over each message to build the user-advertisement pairs
        // Iterate over each message to build the user-advertisement pairs
        foreach ($messages as $message) {
            // Determine the user ID of the other party in the conversation
            $otherUserId = $message->from_user_id == $currentUserId ? $message->to_user_id : $message->from_user_id;

            // Add the advertisement ID to the user's array in the user-advertisement pairs array
            if (!isset($userAdvertisements[$otherUserId])) {
                $userAdvertisements[$otherUserId] = [];
            }
            \Log::info($message->advertisement_id);

            // Append the advertisement ID to the array, only if it's not already present
            if (!in_array($message->advertisement_id, $userAdvertisements[$otherUserId])) {
                $userAdvertisements[$otherUserId][] = $message->advertisement_id;
            }
        }

        \Log::info($userAdvertisements);

        return $userAdvertisements;
    }







    public static function sendNotification(Request $request, $senderId, $receiverId)
    {
        $sender = User::findOrFail($senderId);
        $receiver = User::findOrFail($receiverId);

        // Prepare email notification details
        $details = [
            'greeting' => 'Ahoj ' . $receiver->name . ',',
            'body' => 'používateľ ' . $sender->name . ' Vám poslal správu do četu.',
            'actiontext' => 'Pozri správu!',
            'actionurl' => '/',
            'lastline' => 'Ďakujeme, že používaš Offered!',
            'advertisement_id' => $request->input('advertisement_id'), // Optional: Include advertisement_id in the notification
        ];

        // Send email notification to the receiver
        Notification::send($receiver, new SendEmailNotification($details));

        // Optional: You can also send a notification to the sender if needed
        // Notification::send($sender, new SendEmailNotification($details));

        return response()->json(['message' => 'Email notification sent successfully']);
    }
}
