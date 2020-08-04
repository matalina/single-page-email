<?php
namespace BSE\Checknow;

class Response
{
    protected $message;
    protected $code;

    public function exec($callback)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($callback) {
                $this->message = 'Request successful.';
                $this->code = 200;

                return $this;
            }

            $this->message = 'Request was not sent.';
            $this->code = 500;

            return $this;
        }

        $this->message = 'Invalid request.';
        $this->code = 403;

        return $this;
    }

    public function get()
    {
        return json_decode(file_get_contents("php://input"));
    }

    public function send()
    {
        header('Content-Type: application/json');
        http_response_code($this->code);
        echo json_encode([
            'message' => $this->message,
            'code' => $this->code,
        ]);
    }
}