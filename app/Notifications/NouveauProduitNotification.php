<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class NouveauProduitNotification extends Notification
{
    use Queueable;
    public $produit;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($produit)
    {
        $this->produit=$produit;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('Une nouvelle notification')->markdown('emails.produit.nouveau-produit-notification',
        [
            'produit'=>$this->produit
        ]
    );
        
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

    public function toNexmo($notifiable)
    {
    return (new NexmoMessage)
                ->content('Message envoyé par la plateforme formation Laravel')
                ;
    }
}
