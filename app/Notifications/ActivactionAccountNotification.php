<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Crypt;

class ActivactionAccountNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function subject($notifiable): string
    {
        return 'Bem-vindo ' . Crypt::decrypt($notifiable->firstname) . '!';
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->subject($notifiable))
            ->line('Olá ' . Crypt::decrypt($notifiable->firstname) . '!')
            ->line('Nós recebemos um pedido de registo na nossa aplicação, e para confirmar o seu registo, e ativar a sua conta, por favor clique no botão abaixo.')
            ->action('Confirmar o meu registo, e ativar a minha conta', url('/auth/activate-account/' . $notifiable->ActivationAccount->token . '/'))
            ->line('Caso não tenha feito este pedido, por favor ignore este email.')
            ->line('Agradecemos a sua confiança!');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
