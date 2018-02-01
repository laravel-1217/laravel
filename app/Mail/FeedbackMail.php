<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
       /* return $this->from('no-reply@myblog.ru')
            ->view('mails.feedback', [
                'data' => $this->data
        ]);*/

        return $this->view('mails.feedback')
            ->from(['address' => $this->data['email']])
            ->with(['data' => $this->data])
            ->subject('Письмо с блога')
            ->attach(base_path('.env'));
    }
}
