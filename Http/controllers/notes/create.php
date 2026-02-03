<?php 

use Core\Database;
use Core\Validator;

$userId = $_SESSION['user']['id'];

$errors = [];

view("notes/create.view.php", [
    'page' => 'Create Note',
    'errors' => $_SESSION['errors'] ?? []
]);