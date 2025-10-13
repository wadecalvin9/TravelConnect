<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\destination;
use App\Models\Tour;

class InquiryNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
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
    // Look up the destination name using the ID
    $destination = destination::find($this->data['destination_id']);
    $tour = Tour::find($this->data['tour_id']);
    $tourName = $tour ? $tour->name : 'Day safari';
    $destinationName = $destination ? $destination->name : 'Unknown';
    return (new MailMessage)
        ->subject('New Inquiry from ' . $this->data['fullname'])
        ->greeting('Hello Admin,')
        ->line('You have a new inquiry from ' . $this->data['fullname'])
        ->line('**Name:** ' . $this->data['fullname'])
        ->line('**Email:** ' . $this->data['email'])
        ->line('**Phone:** ' . $this->data['phone'])
        ->line('**People:** ' . $this->data['people'])
        ->line('**Date:** ' . $this->data['date'])
        ->line('**Destination:** ' . $destinationName)
        ->line('**Hotel:** ' . $tourName)
        ->line('**Message:** ' . ($this->data['message'] ?? 'No message provided.'))
        ->line('Thank you for using our application!');
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
