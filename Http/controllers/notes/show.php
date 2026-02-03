<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

$sql = "SELECT * FROM notes WHERE id = :id"; 
$note = $db->query($sql, ['id' => $_GET['id']])->findOrFail();


// dd([
//   'session_user_id' => $_SESSION['user']['id'],
//   'note_user_id' => $note['user_id'],
//   'note_id' => $note['id']
// ]);

authorize($note['user_id'] == $userId);

view("notes/show.view.php", [
    'page' => 'Note',
    'note' => $note
]);