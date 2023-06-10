<?php


namespace App\Utils;

class Message
{
    private $sessionKey = "message_./'][.;,!@#$%^&kuglsaduflsjahjgoyd*)";
    private $session; // session object
    public function __construct()
    {
        $this->session = session($this->sessionKey);
    }

    public function resolve()
    {
        if (!$this->session->has("messages"))
            return;

        $messages = $this->session->get('messages');
        if ($messages['expired'] === false) {
            $messages['expired'] = true;
            $this->session->put('messages', $messages);
            return;
        }

        $this->session->forget('messages');
    }


    public function setMessage($key, $value)
    {
        $messages = $this->session->get('messages')['items'];
        $messages[$key] = $value;
        $this->session->put('messages', ['expired' => false, 'items' => $messages]);
    }


    public function message($key)
    {
        if (!$this->session->has('messages'))
            return null;

        $messages = $this->session->get('messages')['items'];

        if (!array_key_exists($key, $messages))
            return null;

        return $messages[$key];
    }
}