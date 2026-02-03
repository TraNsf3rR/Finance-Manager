<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$errors = [];

$id   = $_POST['id'] ?? null;
$body = $_POST['body'] ?? '';

$sql  = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($sql, ['id' => $id])->findOrFail();

authorize($note['user_id'] == $userID);

$body_min_ln = 3;
$body_max_ln = 5;

if (! Validator::string($body, $body_min_ln, $body_max_ln)) {
    $errors['body'] = "Jābūt starp {$body_min_ln} un {$body_max_ln} simboli";
}

if (! empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'body' => $body
    ];

    redirect("/note/edit?id={$id}");
}

$sql = "UPDATE notes SET body = :body WHERE id = :id";
$db->query($sql, [
    'body' => $body,
    'id'   => $id
]);

redirect('/notes');
