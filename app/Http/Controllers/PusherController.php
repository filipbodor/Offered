<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Message;

class PusherController extends Controller
{
    public function index()
    {
        return view('chat.chat');
    }

    public function broadcast(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'to_user_id' => 'required|integer',
            'advertisement_id' => 'required|integer',
        ]);

        $fromUser = auth()->user();
        $fromUserProfilePicUrl = $fromUser->profile_photo_url;

        $message = Message::create([
            'from_user_id' => $fromUser->id,
            'to_user_id' => $request->to_user_id,
            'advertisement_id' => $request->advertisement_id,
            'content' => $request->message
        ]);

        broadcast(new PusherBroadcast($message->from_user_id, $message->to_user_id, $message->advertisement_id, $message->content, $fromUserProfilePicUrl))->toOthers();

        return response()->json(['status' => 'Message sent']);
    }



    public function receive(Request $request)
    {
        // Validate the incoming request if needed
        // You can add validation rules here

        // Create a new message record in the database
        $message = new Message();
        $message->from_user_id = auth()->id();
        $message->to_user_id = $request->input('to_user_id');
        $message->advertisement_id = $request->input('advertisement_id');
        $message->content = $request->input('message');
        $message->save();

        // You can return a success response or anything you need
        return response()->json(['status' => 'Message stored successfully']);
    }
}
