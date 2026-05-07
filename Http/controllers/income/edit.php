<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'] ?? null;
$incomeId = $_GET['id'] ?? null;

if (!$incomeId) {
    redirect('/');
}

$sql = "SELECT * FROM income WHERE id = :id";
$income = $db->query($sql, ['id' => $incomeId])->findOrFail();

authorize($income['user_id'] == $userId);

view('income/edit.view.php', [
    'income' => $income
]);
