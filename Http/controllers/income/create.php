<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

// Verification that all required fields have been filled
if (!empty($_POST['description']) && !empty($_POST['amount']) && !empty($_POST['date']) && !empty($_POST['source'])) {
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $source = $_POST['source'];

    // Insert expense in Database
    $sql = 'INSERT INTO income (user_id, description, amount, date, source) VALUES (:user_id, :description, :amount, :date, :source)';
    $db->query($sql, [
        'user_id' => $userId,
        'description' => $description,
        'amount' => $amount,
        'date' => $date,
        'source' => $source
    ]);
} else {
    // Error message
    $_SESSION['errors'] = "All fields must be filled in order to add income";
}

if (empty($_SESSION['errors'])) {
    // Success message
    $_SESSION['success'] = 'Income added';
};

redirect('/');

