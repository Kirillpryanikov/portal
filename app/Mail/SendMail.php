<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(env('MAIL_ADDRESS_FROM'))
                    ->to(env('MAIL_ADDRESS_TO'))
//            ->from(config('mail.from.address'))
//            ->to(config('mail.to.address'))
                    ->subject('Partner Profile Change Request')
                    ->with(['data'=>$this->data])
                    ->view('mail.mail');
    }
}
