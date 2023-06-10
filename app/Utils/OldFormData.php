<?php


namespace App\Utils;

class OldFormData
{
    private $sessionKey = "old_form_data_./'][.;,!@#$%^&kuglsaduflsjahjgoyd*)";
    private $session; // session object
    public function __construct()
    {
        $this->session = session($this->sessionKey);
    }



    public function resolve()
    {
        $current_form_data = $this->session->get('current_form_data');
        $this->session->put('old_form_data', $current_form_data);
        $this->session->put('current_form_data', request()->all());
    }

    public function old($key)
    {
        if (!$this->session->has('old_form_data'))
            return null;
        $old_form_data = $this->session->get('old_form_data');

        if (!array_key_exists($key, $old_form_data))
            return null;

        return $old_form_data[$key];
    }
}