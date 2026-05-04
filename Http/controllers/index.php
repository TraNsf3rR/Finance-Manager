<?php

use Core\App;
use Core\Database;

// Logic to show all expenses
$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'] ?? NULL;

$sql = "SELECT * FROM expenses WHERE user_id = :user_id ORDER BY date DESC";
$expenses = $db->query($sql, ['user_id' => $userId])->get();

$sql = "SELECT * FROM income WHERE user_id = :user_id ORDER BY date DESC";
$incomes = $db->query($sql, ['user_id' => $userId])->get();

$sql = "SELECT id, source_name FROM income_sources WHERE user_id = :user_id ORDER BY source_name ASC";
$incomeSources = $db->query($sql, ['user_id' => $userId])->get();

view("index.view.php", [
    'expenses' => $expenses,
    'incomes' => $incomes,
    'incomeSources' => $incomeSources
]);
