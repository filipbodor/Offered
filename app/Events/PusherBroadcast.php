<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PusherBroadcast implements ShouldBroadcast
{
    public $fromUserId;
    public $toUserId;
    public $advertisementId;
    public $content;
    public $fromUserProfilePicUrl;

    public function __construct($fromUserId, $toUserId, $advertisementId, $content, $fromUserProfilePicUrl)
    {
        $this->fromUserId = $fromUserId;
        $this->toUserId = $toUserId;
        $this->advertisementId = $advertisementId;
        $this->content = $content;
        $this->fromUserProfilePicUrl = $fromUserProfilePicUrl;
    }

    public function broadcastOn()
    {
        return 'chat';
    }

    public function broadcastAs()
    {
        return 'message';
    }
}
