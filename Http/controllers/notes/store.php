<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

$errors = [];

$body = $_POST['body'] ?? '';

$body_min_ln = 3;
$body_max_ln = 15;

if (! Validator::string($body, $body_min_ln, $body_max_ln)) {
    $errors['body'] = "The body must be between {$body_min_ln} and {$body_max_ln} characters";
}

if (! empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'body' => $body
    ];

    redirect('/notes/create');
}

$sql = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";
$db->query($sql, [
    'body' => $body,
    'user_id' => $userId
]);

$_SESSION['success'] = 'Note created.';

redirect('/notes');
