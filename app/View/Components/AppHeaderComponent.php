<?php

namespace App\View\Components;

use App\Models\Notification;
use App\Repositories\NotificationRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppHeaderComponent extends Component
{
    private NotificationRepository $notifications;

    public function __construct()
    {
        // Get all notifications by authenticable user
        $this->notifications = new NotificationRepository();
        $this->notifications->getNotificationsByAuthenticableUser();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //


        return view('components.app.header')
            ->withNotifications($this->notifications);
    }
}
