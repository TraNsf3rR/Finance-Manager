<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

// Verification that all required fields have been filled
if (!empty($_POST['description']) && !empty($_POST['amount']) && !empty($_POST['date']) && !empty($_POST['category'])) {
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $category = $_POST['category'];

    // Insert expense in Database
    $sql = 'INSERT INTO expenses (user_id, description, amount, date, category) VALUES (:user_id, :description, :amount, :date, :category)';
    $db->query($sql, [
        'user_id' => $userId,
        'description' => $description,
        'amount' => $amount,
        'date' => $date,
        'category' => $category
    ]);
} else {
    // Error message
    $_SESSION['errors'] = "All fields must be filled in order to add expense";
}

if (empty($_SESSION['errors'])) {
    // Success message
    $_SESSION['success'] = 'Expense added';
};

redirect('/');

