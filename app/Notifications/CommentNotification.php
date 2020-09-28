<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;
    protected $article;
    protected $body;
 
    public function __construct($article, $body)
    {
        $this->article = $article;
        $this->body = $body;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'status' => "yorum",
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'article' => $this->article->slug,
            'body' => $this->body,
        ];
    }
}
