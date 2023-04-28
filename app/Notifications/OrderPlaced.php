<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $order, $is_admin;
    public function __construct(Order $order, $is_admin = false)
    {
        //
        $this->order = $order;
        $this->is_admin = $is_admin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $notifiable->prefers_sms ? ['vonage'] : ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = $this->is_admin ? url('/admin/orders/'.$this->order->order_code) : url('/seller/orders/'.$this->order->order_code);
        return (new MailMessage)
                    ->line('Hurray!. An order just came in')
                    ->action('View Order', $url)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $url = $this->is_admin ? url('/admin/orders/'.$this->order->order_code) : url('/seller/orders/'.$this->order->order_code);
        return [
            'message' => 'Order code: '.$this->order->order_code.' has been Placed',
            'invoice_id' => $this->order->id,
            'amount' => $this->order->amount,
            'url' => $url
        ];
    }
}
