<?php

namespace App\Notifications;

use App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewItem extends Notification
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
        $text['text'] = "you have created a new item with the title " . $item->title;
        if ($item->stock == null)
            $amount = 'with unlimited amount';
        else
            $amount = 'with ' . $item->stock . ' amount';
        $text['text'] = $text['text'] . $amount;
        $text['link'] = '/item/' . $item->id;


        $this->text = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line($this->text['text'])
            ->action('See the new item here', url($this->text['link']))
            ->line('Thank you for using our Stock!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
