<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use App\Expedition;

class StatusDemandeExpedition extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Expedition $expedition, $status)
    {
        $this->user = $user;
        $this->expedition = $expedition;
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
                        ->subject('Demande d\'expédition acceptée !')
                        ->greeting('Psssst !')
                        ->line('Votre demande d\'expédition a été acceptée !')
                        ->line('<center><b>Expedition: '.$this->expedition->villeDep->name.' ↬ '.$this->expedition->villeArr->name.'</b></center>')
                        ->line('Maintenant, merci de contacter l\'expediteur:')
                        ->line('<b>Nom:</b> '.$this->user->login)
                        ->line('<b>Tel:</b> '.$this->user->phone)
                        ->line('<b>Email:</b> '.$this->user->email)
                        ->action('Voir mes demandes', env('APP_URL').'/user/myrequest')
                        ->line('Vous pouvez consulter à tout moment les demandes dans la partie "Mes Demandes" du site !');
        } else {
            return (new MailMessage)
                        ->subject('Demande d\'expédition refusée')
                        ->greeting('Désolé,...')
                        ->line('Votre demande d\'expédition n\'a pas été accepté !')
                        ->line('<center><b>Expedition: '.$this->expedition->villeDep->name.' ↬ '.$this->expedition->villeArr->name.'</b></center>')
                        ->action('Chercher une nouvelle expédition !', env('APP_URL').'/search/expedition')
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
