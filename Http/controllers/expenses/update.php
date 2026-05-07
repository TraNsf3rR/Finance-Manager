<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'] ?? null;
$expenseId = $_POST['id'] ?? null;

if (!$expenseId) {
    redirect('/');
}

if (empty($_POST['description']) || empty($_POST['amount']) || empty($_POST['date']) || empty($_POST['category'])) {
    $_SESSION['errors'] = 'All fields must be filled in order to update expense';
    redirect("/expenses/edit?id={$expenseId}");
}

$sql = "SELECT * FROM expenses WHERE id = :id";
$expense = $db->query($sql, ['id' => $expenseId])->findOrFail();

authorize($expense['user_id'] == $userId);

$sql = 'UPDATE expenses SET description = :description, amount = :amount, date = :date, category = :category WHERE id = :id';
$db->query($sql, [
    'description' => $_POST['description'],
    'amount' => $_POST['amount'],
    'date' => $_POST['date'],
    'category' => $_POST['category'],
    'id' => $expenseId
]);

$_SESSION['success'] = 'Expense updated';
redirect('/');
