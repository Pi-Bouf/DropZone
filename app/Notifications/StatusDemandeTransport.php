<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use App\Transport;

class StatusDemandeTransport extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Transport $transport, $status)
    {
        $this->user = $user;
        $this->transport = $transport;
        $this->stateDemande = $status;
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
        if($this->stateDemande) {
            return (new MailMessage)
                        ->subject('Demande de transport acceptée !')
                        ->greeting('Psssst !')
                        ->line('Votre demande de transport a été acceptée !')
                        ->line('<center><b>Transport: '.$this->transport->villeDepart->ville->name.' ↬ '.$this->transport->villeArrivee->ville->name.'</b></center>')
                        ->line('Maintenant, merci de contacter le transporteur:')
                        ->line('<b>Nom:</b> '.$this->user->login)
                        ->line('<b>Tel:</b> '.$this->user->phone)
                        ->line('<b>Email:</b> '.$this->user->email)
                        ->action('Voir mes demandes', env('APP_URL').'/user/myrequest')
                        ->line('Vous pouvez consulter à tout moment les demandes dans la partie "Mes Demandes" du site !');
        } else {
            return (new MailMessage)
                        ->subject('Demande de transport refusée')
                        ->greeting('Désolé,...')
                        ->line('Votre demande de transport n\'a pas été accepté !')
                        ->line('<center><b>Transport: '.$this->transport->villeDepart->ville->name.' ↬ '.$this->transport->villeArrivee->ville->name.'</b></center>')
                        ->action('Chercher un nouveau transport !', env('APP_URL').'/search/transport')
                        ->line('Vous pouvez consulter à tout moment les demandes dans la partie "Mes Demandes" du site !');
        }
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
