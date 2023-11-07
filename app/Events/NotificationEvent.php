<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public string $message;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user, $message)
    {
        //
        $this->message = $message;
    }

    public function broadcastWith(): array
    {
        return [
            'user' => $this->user,
            'message' => $this->message
        ];
    }

    public function broadcastNew(): string
    {
        return 'newNotification';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('notifications'),
        ];
    }
}
