<?php

namespace App\Notifications;

use App\Models\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PDF;

class EnviarReserva extends Notification
{
    use Queueable;
    protected Reserva $reserva;
    /**
     * Create a new notification instance.
     */
    public function __construct($reserva)
    {
        $this->reserva=$reserva;
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
        $reserva=$this->reserva;

        $data = array(
            'reserva'=>$reserva
        );

        $pdf = PDF::loadView('mis-reservas.recibo-pdf',$data);
        $pdf_data = $pdf->output();



        return (new MailMessage)
                    ->subject('RESERVA DE '.$reserva->servicio->nombre)
                    ->line('SE REALIZO UNA SOLICITUD DE UNA RESERVA')
                    ->line('Gracias por preferirnos!')
                    ->attachData($pdf_data,'RESERVA DE '.$reserva->servicio->nombre.'.pdf');
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
