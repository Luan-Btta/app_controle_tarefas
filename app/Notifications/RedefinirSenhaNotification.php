<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;

    public $token;
    public $email;
    public $name;

    /**
     * Create a new notification instance.
     */
    public function __construct($token, $email, $name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = "http://localhost/password/reset/$this->token?email=$this->email";
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $saudacao = "Olá $this->name";

        return (new MailMessage)
            ->subject(Lang::get('Recuperação de Senha'))
            ->greeting($saudacao)
            ->line(Lang::get('Esqueceu a senha? Esta é uma notificação para recuperar seu acesso.'))
            ->action(Lang::get('Clique para redefinir a senha'), $url)
            ->line(Lang::get('Este recurso expira em '.$minutos.' minutos'))
            ->line(Lang::get('Gentileza ignorar esta mensagem caso não tenha solicitado.'))
            ->salutation('Até breve!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
