<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'] ?? null;
$incomeId = $_POST['id'] ?? null;

if (!$incomeId) {
    redirect('/');
}

if (empty($_POST['description']) || empty($_POST['amount']) || empty($_POST['date']) || empty($_POST['source'])) {
    $_SESSION['errors'] = 'All fields must be filled in order to update income';
    redirect("/income/edit?id={$incomeId}");
}

$sql = "SELECT * FROM income WHERE id = :id";
$income = $db->query($sql, ['id' => $incomeId])->findOrFail();

authorize($income['user_id'] == $userId);

$sql = 'UPDATE income SET description = :description, amount = :amount, date = :date, source = :source WHERE id = :id';
$db->query($sql, [
    'description' => $_POST['description'],
    'amount' => $_POST['amount'],
    'date' => $_POST['date'],
    'source' => $_POST['source'],
    'id' => $incomeId
]);

$_SESSION['success'] = 'Income updated';
redirect('/');
