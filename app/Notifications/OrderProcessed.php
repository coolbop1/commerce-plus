<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SimpleMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;


class OrderProcessed extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['vonage'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        return ['vonage', 'mail', 'database'];
        //return (new MailMessage)->markdown('mail.order-processed');
    }

    /**
     * Get the Vonage / SMS representation of the notification.
     */
    // public function toVonage(object $notifiable): VonageMessage
    // {
    //     return (new VonageMessage)
    //                 ->content('Your SMS message content');
    // }

    public function toVonage(object $notifiable)// VonageMessage
    {
        $message = "Your order with code :".$this->order->order_code." has been accepted and processed";
        return (new VonageMessage)
                    ->content($message);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $url = url('/buyer/orders/'.$this->order->order_code);
        return [
            'message' => 'Order code: '.$this->order->order_code.' has been Placed',
            'invoice_id' => $this->order->id,
            'amount' => $this->order->amount,
            'url' => $url
        ];
    }
}
