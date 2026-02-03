<?php

namespace Http\Forms;
use Core\Validator;

class LoginForms {

    protected $errors = [];

    public function validate($email, $password) {

        if (! Validator::email($email)) {
        $errors['email'] = "Ievadiet derīgu ēpastu";
        }

        if (! Validator::string($password, 4, 255)) {
            $this->errors['password'] = "Ievadiet derīgu paroli!";
        }

        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function setError($field, $message) {
        $this->errors[$field] = $message;
    }
 
}