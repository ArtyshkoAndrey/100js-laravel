<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewDay extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */

    public $slug;
    public $name;
    public $short_discr;



    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($name, $slug, $short_discr)
    {
        $this->slug = $slug;
        $this->name = $name;
      	$this->short_discr = $short_discr;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject('Не пропусти новый день')
            ->greeting(sprintf('Привет друг'))
            ->line('Сегодня я добавил новый "день"! Зайди и посмотри до чего я додумался на этот раз!')
            ->action($this->name, url('day/' . $this->slug))
            ->line($this->short_discr)
            ->salutation('С увеженивем, 100 Days of JavaScript');
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
