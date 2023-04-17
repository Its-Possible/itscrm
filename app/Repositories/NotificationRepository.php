<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository {

    private Notification $notification;

    public int $limit = 10;

    public function __construct() {
        $this->notification = new Notification();
    }

    /**
     * Get all notifications by authenticable user
     * @return Notification
     */
    public function getNotificationsByAuthenticableUser(): mixed {
        return $this->notification->where('user_id', auth()->user()->id)->limit($this->limit)->get();
    }

    /**
     * Get all notifications not read by authenticable user
     * @return Notification
     */
    public function getNotificationsNotReadByAuthenticableUser(): Notification {
        return $this->notification->where('user_id', auth()->user()->id)->whereIsNull('read_at')->first();
    }


}
