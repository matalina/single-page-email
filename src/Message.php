<?php


namespace BSE\Checknow;


class Message
{
    public function __construct()
    {

    }

    public function make($data)
    {
        $string = '<p>A potential customer has requested to get started at checknow.biz. Please follow up immediately.</p>';

        $string .= "<p>Name: $data->first_name $data->last_name<br/>";
        $string .= "Phone Number: $data->phone_number<br/>";
        $string .= "Address: $data->address, $data->city, $data->state $data->zip<br/>";
        $string .= "Email: $data->email</p>";

        return $string;

    }
}