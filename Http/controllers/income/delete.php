<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'] ?? null;
$incomeId = $_POST['id'] ?? null;

if (!$incomeId) {
    redirect('/');
}

$sql = "SELECT * FROM income WHERE id = :id";
$income = $db->query($sql, ['id' => $incomeId])->findOrFail();

authorize($income['user_id'] == $userId);

$sql = "DELETE FROM income WHERE id = :id";
$db->query($sql, ['id' => $incomeId]);

redirect('/');
