<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SendEmail extends Notification
{
    use Queueable;
    private $username;
    private $about;
    private $mymessage;
    public $sentSuccessfully;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username,$about,$mymessage)
    {
        $this->username = $username;
        $this->about = $about;
        $this->mymessage = $mymessage;
        $this->sentSuccessfully = false;
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
        $time = Carbon::now();
        //dd($time,$this->username,$this->about,$this->mymessage);
        $datetime = $time->toDateTimeString();
        $DT = explode(' ', $datetime);
        return (new MailMessage)
        ->from('mgmyint7850@gmail.com', "MAILER-NAME")
        ->subject(config('mail.subject'))
        ->view('frontend.mail.mail', array(
            'username' => $this->username,
            'about' => $this->about,
            'mymessage' => $this->mymessage,
            'date' => $DT[0],
            'time' => $DT[1],
        ));
    }
    public function setSentSuccessfully($value)
    {
        $this->sentSuccessfully = $value;
    }

}
