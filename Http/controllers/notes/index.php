<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

$sql = "SELECT * FROM notes WHERE user_id = :user_id ORDER BY id DESC";
$notes = $db->query($sql, ['user_id' => $userId])->get();

view("notes/index.view.php", [
    'page' => 'Notes',
    'notes' => $notes
]);
