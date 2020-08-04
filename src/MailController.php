<?php
namespace BSE\Checknow;

class MailController
{
    public function sendMail($data)
    {
        $mail = new SendMail();

        return $mail->send($data);
    }
}