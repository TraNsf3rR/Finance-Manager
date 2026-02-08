<?php

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);

view("registration/create.view.php", [
    'page' => 'Register',
    'errors' => $errors,
    'old' => $old
]);
