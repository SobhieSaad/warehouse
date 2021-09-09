<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    use SerializesModels;
    public $userId;
    public $itemId;
    public function __construct($userId,$itemId)
    {
        $this->userId = $userId;
        $this->itemId=$itemId;

    }
    public function broadcastOn()
    {
        return [];
    }
}
