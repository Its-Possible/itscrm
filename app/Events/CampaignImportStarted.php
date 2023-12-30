<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CampaignImportStarted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

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

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {

        $notification = new Notification();

        return [
            new Channel('app-notification'),
        ];
    }

    public function broadcastAs(): string
    {
        return "campaign-import-started.app-notification";
    }

    public function broadcastWith(): array
    {
        return [
            "title" => $this->title,
            "message" => $this->message
        ];
    }
}
