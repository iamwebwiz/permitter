<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationSubmittedNotification extends Notification
{
    use Queueable;

    /** @var array */
    protected $data;

    /** @var string */
    protected const SUBJECT = 'New Application Submitted';

    /**
     * Create a new notification instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
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
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting("Hello, {$this->data['reviewer']->name}")
            ->subject(self::SUBJECT)
            ->line('A new application has been submitted on ' . config('app.name'))
            ->line('Kindly log in to take action on the submission.')
            ->action('Click Here to Login', route('reviewer.dashboard'))
            ->line('Best regards!');
    }
}
