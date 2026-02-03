<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

$sql = "SELECT * FROM notes WHERE id = :id"; 
$note = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

authorize ($note['user_id'] == $userId);

view("notes/edit.view.php", [
    'page' => 'Edit Note',
    'errors' => $_SESSION['errors'] ?? [],
    'note' => $note
]);