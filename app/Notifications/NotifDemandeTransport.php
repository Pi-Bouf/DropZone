<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;
use App\User;
use App\Transport;
use App\DemandeTransport;

class NotifDemandeTransport extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Transport $transport, DemandeTransport $demande)
    {
        $this->transport = $transport;
        $this->demande = $demande;
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
        return (new MailMessage)
                    ->subject('Nouvelle demande pour votre transport !')
                    ->greeting('Psssst !')
                    ->line('Vous avez une nouvelle demande de transport !')
                    ->line('<center><b>Transport: '.$this->transport->villeDepart->ville->name.' ↬ '.$this->transport->villeArrivee->ville->name.'</b></center>')
                    ->line('<b>Nom:</b> '.$this->demande->user->login)
                    ->line('<b>Prix:</b> '.$this->demande->cost.'€')
                    ->line('<b>Message:</b><br /> '.$this->demande->text)
                    ->action('Voir les demandes', env('APP_URL').'/user/mytransport')
                    ->line('Vous pouvez consulter à tout moment les demandes dans la partie "Mes Transports" du site !');
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
