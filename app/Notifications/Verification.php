<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Verification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $array['subject'] = "Account Verification!!";
        $array['content'] = "Welcome {$notifiable->name} Please verify your ".env('APP_NAME')." account to continue";
        $key = bcrypt($notifiable->id);
        $hash = str_split($key, 30);
        $key_hash = $hash[0].'$rpm'.$notifiable->id.'$rpm'.$hash[1];
        $key_hash = str_replace('/', 'k0k0k', $key_hash);
        $array['link'] = url("/verify-account/{$key_hash}");
        return (new MailMessage)->markdown('emails.verification', compact('array'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
