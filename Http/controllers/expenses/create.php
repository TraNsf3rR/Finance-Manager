<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

// Verification that all required fields have been filled
if (!empty($_POST['add_description']) && !empty($_POST['add_amount']) && !empty($_POST['add_date']) && !empty($_POST['add_category'])) {
    $description = $_POST['add_description'];
    $amount = $_POST['add_amount'];
    $date = $_POST['add_date'];
    $category = $_POST['add_category'];

    // Insert expense in Database
    $db->query('INSERT INTO expenses (user_id, description, amount, date, category) VALUES (:user_id, :description, :amount, :date, :category)', [
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

// Success message
if (empty($_SESSION['errors'])) {
    $_SESSION['success'] = 'Expense added';
};

view("/index.view.php");

