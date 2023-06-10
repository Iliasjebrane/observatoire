<?php


namespace App\Utils;

class FormValidationErrors
{
    private $sessionKey = "form_validation_errors_./'][.;,!@#$%^&kuglsaduflsjahjgoyd*)";
    private $session; // session object
    public function __construct()
    {
        $this->session = session($this->sessionKey);
    }

    public function resolve()
    {
        if (!$this->session->has("errors"))
            return;

        $errors = $this->session->get('errors');
        if ($errors['expired'] === false) {
            $errors['expired'] = true;
            $this->session->put('errors', $errors);
            return;
        }

        $this->session->forget('errors');
    }


    public function setErrors(array $errors)
    {
        $this->session->put('errors', ['expired' => false, 'items' => $errors]);
    }


    public function error($key)
    {
        if (!$this->session->has('errors'))
            return null;

        $errors = $this->session->get('errors')['items'];

        if (!array_key_exists($key, $errors))
            return null;

        return $errors[$key];
    }
}