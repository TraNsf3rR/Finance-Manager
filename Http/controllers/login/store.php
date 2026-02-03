<?php
use Core\Authenticator;
use Http\Forms\LoginForms;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForms();

if ($form->validate($email, $password)) {

    $auth = new Authenticator();
    if($auth->attempt($email, $password)) {
        redirect('/');
    }

    $form->setError('email', 'Email or password incorrect!');

}
Session::flash('errors', $form->errors());
redirect('/login');

