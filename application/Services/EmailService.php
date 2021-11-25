<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Auth7\Model\HumanModel;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;

class EmailService
{
    private $mailer;
    private $model;

    public function __construct()
    {
        $this->model = new HumanModel();
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
                    '&token=' . \urlencode($token) . ">Click here</a>");

            $this->mailer->send($email);

            $_SESSION['verification_email_sent'] = true;
            Helper::redirect('register');
        } catch (\Throwable $th) {
            $_SESSION['verification_email_not_sent'] = true;
            Helper::redirect('register');
        }
    }

    public function sendEmailChangeNotification(
        $selector,
        $token,
        $newEmail
    ) {
        try {

            $email = (new Email())
                ->from('hello@example.com')
                ->to($newEmail)
                ->subject('Change Email')
                ->html("<p>verify your new email</p><a href=" . URL .
                    'changeEmail?verified=1&selector=' . \urlencode($selector) .
                    '&token=' . \urlencode($token) . ">Click here</a>");

            $this->mailer->send($email);

            /** set human.updated
             *value to now */
            $this->model->updated($this->model->auth->getUserId());


            $_SESSION['verification_email_sent'] = true;
            Helper::redirect('changeEmail');
        } catch (\Throwable $th) {
            $_SESSION['verification_email_not_sent'] = true;
            Helper::redirect('changeEmail');
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
                    '&token=' . \urlencode($token) . '&email=' . $registeredUserEmail . ">Click here</a>");

            $this->mailer->send($email);

            $_SESSION['forgot_password_email_sent'] = true;
            Helper::redirect('forgotPassword');
        } catch (\Throwable $th) {
            $_SESSION['forgot_password_email_not_sent'] = true;
            Helper::redirect('forgotPassword');
        }
    }

    public function sendPasswordResetEmail($loggedUserEmail)
    {
        try {
            $email = (new Email())
                ->from('hello@example.com') //TODO: set environement vars
                ->to($loggedUserEmail)
                ->subject('Password reseted')
                ->html("Your password have been reseted - Date : " . date("Y-m-d H:i:s", time())); //TODO:format date to AM

            $this->mailer->send($email);
        } catch (\Throwable $th) {
            Helper::redirect('error'); // Define email failure error page
        }
    }
}
