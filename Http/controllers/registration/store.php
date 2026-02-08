<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];

$_SESSION['old'] = [
    'email' => $email
];

if (! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

$passw_min_ln = 4;
$passw_max_ln = 255;

if (! Validator::string($password, $passw_min_ln, $passw_max_ln)) {
    $errors['password'] = "Please provide a password at least {$passw_min_ln} characters.";
}

if (! empty($errors)) {
    $_SESSION['errors'] = $errors;
    redirect('/register'); 
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    $_SESSION['errors'] = [
        'email' => 'Email already registered. Please log in.'
    ];
    redirect('/register');
}

$db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

$userID = $db->connection->lastInsertId();

login([
    'id' => $userID,
    'email' => $email
]);

unset($_SESSION['old']);

redirect('/');
