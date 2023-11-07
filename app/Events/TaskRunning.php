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

class TaskRunning
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private int $user;
    private string $title;
    private string $message;

    /**
     * Create a new event instance.
     */
    public function __construct(string $title, string $message)
    {
        //
        $this->title = $title;
        $this->message = $message;
    }

    public function broadcastWith(): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
    }

    public function broadcastAs(): string
    {
        return "task-schedule-running";
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
