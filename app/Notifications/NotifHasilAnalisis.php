<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NotifHasilAnalisis extends Notification
{
    use Queueable;

    protected $order;
    protected $hasilAnalisis;
    protected $pdfPath;

    public function __construct($order, $hasilAnalisis, $pdfPath)
    {
        $this->order = $order;
        $this->hasilAnalisis = $hasilAnalisis;
        $this->pdfPath = $pdfPath;
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
        return (new MailMessage)
            ->line('P bang.')
            ->action('Lihat Sertifikat', route('sertifikat.show', ['id' => $this->order->id]))
            ->attach(public_path($this->pdfPath), [
                'as' => 'certificate_of_analysis.pdf',
                'mime' => 'application/pdf',
            ]);
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
