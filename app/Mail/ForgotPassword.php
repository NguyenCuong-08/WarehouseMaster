<?php

namespace App\Mail;

use App\Http\Helpers\CommonHelper;
use App\Models\EmailTemplate;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Queue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Mail\Mailer;
use Swift_Mailer;
use Swift_SmtpTransport;



class ForgotPassword extends Mailable //implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user, $token;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }
    public function build()
    {
        return $this->view('Hong.Mail.forgotpassword');
    }
}
