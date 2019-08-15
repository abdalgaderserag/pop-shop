<?php

namespace App\Notifications;

use App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UpdatedItem extends Notification
{
    use Queueable;

    protected $text;

    /**
     * Create a new notification instance.
     *
     * @param Item $item
     * @return void
     */
    public function __construct(Item $item)
    {
        $text['text'] = 'the item '. $item->title.' changed checkout the change now!';
        $text['link'] = '/item/' . $item->id;


        $this->text = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->text;
    }
}
