<?php

namespace App\Repositories;

use App\Events\CampaignImportStarted;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class NotificationRepository {

    private Notification $notification;

    public int $limit = 10;

    public function __construct() {
        $this->notification = new Notification();
    }


    /**
     * Create notification on database and send to broadcast
     *
     * @param string $title
     * @param string $message
     * @param string $type
     * @param int $user
     * @return Notification
     *
     * User ID: 0 - Global notification
     */
    public function create(string $title, string $message, int $user = 0, string $type = "notification"): Notification
    {
        $notification = new Notification();
        $notification->user_id = $user;
        $notification->title = encrypt_data($title);
        $notification->message = encrypt_data($message);
        $notification->type = $type;

        if(!$notification->save()){
            Log::danger("Não foi possivel criar uma notificação");
            abort(500);
        }

        CampaignImportStarted::dispatch($notification->title, $notification->message);

        return $notification;
    }

    public function getNotificationGlobal(): Collection {
        return $this->notification->where("user_id", 0)->orWhereNull('user_id');
    }

    public function getNotificationsGlobalNotRead(): mixed {
        return $this->notification->whereNull('read_at');
    }

    /**
     * Get all notifications by authenticate user
     * @return Notification
     */
    public function getNotificationsByAuthenticateUser(): Collection {
        return $this->notification->where('user_id', auth()->user()->id)->limit($this->limit)->get();
    }

    /**
     * Get all notifications not read by authenticable user
     * @return Notification
     */
    public function getNotificationsNotReadByAuthenticateUser(): Notification {
        return $this->notification->where('user_id', auth()->user()->id)->whereIsNull('read_at')->first();
    }


}
