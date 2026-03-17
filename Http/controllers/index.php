<?php

use Core\App;
use Core\Database;

// Logic to show all expenses
$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'];
$sql = "SELECT * FROM expenses WHERE user_id = :user_id ORDER BY date DESC";
$expenses = $db->query($sql, ['user_id' => $userId])->get();

view("index.view.php", [
    'expenses' => $expenses,
    // 'incomes' => $incomes
]);
