<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Rakit\Validation\Validator;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;

class EmailService
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new Mailer(Transport::fromDsn('smtp://null:null@localhost:1025'));
    }

    public function sendEmailVerificationLink(
        $selector,
        $token,
        $registeredUserEmail
    ) {
        try {
            $email = (new Email())
                ->from('hello@example.com')
                ->to($registeredUserEmail)
                ->subject('Vefify your mail')
                ->html("<p>verify your email</p><a href=" . URL .
                    'register/verifyEmail?selector=' . \urlencode($selector) .
                    '&token=' .\urlencode($token) .">Click here</a>");

            $this->mailer->send($email);

            $_SESSION['verfication_email_sent'] = true;
            Helper::redirect('register');
        } catch (\Throwable $th) {
            $_SESSION['verfication_email_not_sent'] = true;
            Helper::redirect('register');
        }
    }
}
