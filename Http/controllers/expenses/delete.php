<?php

use Core\App;
use Core\Database;

echo '<pre>';
var_dump($_SERVER);
echo '</pre>';

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

$sql = "SELECT * FROM expenses WHERE id = :id"; 
$expense = $db->query($sql, ['id' => $_POST['id']])->findOrFail();

authorize($expense['user_id'] == $userId);

$sql ="DELETE FROM expenses WHERE id = :id";
$db->query($sql , ['id' => $_POST['id']]);

redirect('/');