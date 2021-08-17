<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification
{
    use Queueable;
    protected $message;


    public function __construct($message)
    {
        $this->message = $message;
    }


    public function via($notifiable)
    {
        return ['mail', 'database'];
        //return ['database'];
    }


    public function toMail($notifiable)
    {
        #Opcion 1 -> plantilla laravel
        // return (new MailMessage)
        //     ->subject('Mensaje del sitio web')
        //     ->line('Has recibido un mensaje.')
        //     ->action('Click aqui para ', route('messages.show', $this->message->id))
        //     ->line('Gracias por utilizar nuestra app!');

        #Opcion 2 -> por metodo mail
        return (new MailMessage)
            ->view('emails.notifications', [ 'msg' => $this->message, 'user' => $notifiable ])
            ->subject('Mensaje recibido desde web');

        #Opcion 3 -> por controlador Email
        // return (new CustomMail($message))->to($notifiable->email);
    }


    public function toArray($notifiable)
    {
       // return $this->message->toArray();
       return [
           'link' => route('messages.show', $this->message->id),
           'text' => "Has recibido un mensaje de ". $this->message->sender->name
       ];
    }
}
