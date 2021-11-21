<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
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

    public function sendVerificationEmail(
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

    public function sendForgotPasswordEmail(
        $selector,
        $token,
        $registeredUserEmail
    ) {
        try {
            $email = (new Email())
                ->from('hello@example.com') //TODO: set environement vars
                ->to($registeredUserEmail)
                ->subject('Forgot password')
                ->html("<p>Reset Your password</p><a href=" . URL .
                    'resetPassword/verifyAttempt?selector=' . \urlencode($selector) .
                    '&token=' .\urlencode($token) .'&email='.$registeredUserEmail.">Click here</a>");

            $this->mailer->send($email);

            $_SESSION['forgot_password_email_sent'] = true;
            Helper::redirect('forgotPassword');
        } catch (\Throwable $th) {
            $_SESSION['forgot_password_email_not_sent'] = true;
            Helper::redirect('forgotPassword');
        }
    }
}
