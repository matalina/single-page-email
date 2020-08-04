<?php
require_once '../../src/php/bootstrap.php';

use BSE\Checknow\Response;
use BSE\Checknow\MailController;

$response = new Response();
$controller = new MailController();

$response->exec($controller->sendMail($response->get()))
    ->send();



