<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        // You can pass any data to the email if needed
    }

    public function build()
    {
        set_time_limit(120);
        return $this->view('website.emails.test') // Specify the view to use for the email
        ->subject('Test Email from Laravel');
    }
}
