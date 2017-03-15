<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use App\Expedition;
use App\DemandeExpedition;

class NotifDemandeExpedition extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Expedition $expedition, DemandeExpedition $demande)
    {
        $this->expedition = $expedition;
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
                    ->subject('Nouvelle demande d\'expédition !')
                    ->greeting('Psssst !')
                    ->line('Vous avez une nouvelle demande pour votre expedition !')
                    ->line('<center><b>Expedition: '.$this->expedition->description.'</b></center>')
                    ->line('<b>Nom:</b> '.$this->demande->user->login)
                    ->line('<b>Prix:</b> '.$this->demande->prixAsked.'€')
                    ->line('<b>Message:</b><br /> '.$this->demande->propositionText)
                    ->line('<b>Au plus tôt:</b> '.$this->demande->beginDate)
                    ->line('<b>Au plus tard:</b> '.$this->demande->endDate)
                    ->action('Voir les demandes', env('APP_URL').'/user/mypackage')
                    ->line('Vous pouvez consulter à tout moment les demandes dans la partie "Mes Colis" du site !');
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
