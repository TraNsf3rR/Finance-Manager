<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'] ?? null;
$expenseId = $_GET['id'] ?? null;

if (!$expenseId) {
    redirect('/');
}

$sql = "SELECT * FROM expenses WHERE id = :id";
$expense = $db->query($sql, ['id' => $expenseId])->findOrFail();

authorize($expense['user_id'] == $userId);

view('expenses/edit.view.php', [
    'expense' => $expense
]);
