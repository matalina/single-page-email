<?php
namespace BSE\Checknow;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class SendMail
{
    protected $mailer;
    protected $message;

    public function __construct()
    {
        $host = $_ENV['MAIL_HOST'];
        $username = $_ENV['SMTP_USERNAME'];
        $password = $_ENV['SMTP_PASSWORD'];
        $port = $_ENV['MAIL_PORT'];

        $transport = (new Swift_SmtpTransport($host, $port, 'tls'))
            ->setUsername($username)
            ->setPassword($password);

        $this->mailer = new Swift_Mailer($transport);
        $this->message = new Message();

    }

    public function send($data)
    {
        $store_email = 'aliciawilkerson@baberstrunk.com';
        $message = $this->message->make($data);

        $mail = (new Swift_Message('[checknow.biz] Getting Started'))
            ->setFrom('noreply@baberstrunk.com')
            ->setTo($store_email)
            ->setBody($message,'text/html');

        $result = $this->mailer->send($mail);

        return $result;
    }
}