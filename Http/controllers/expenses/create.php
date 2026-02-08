<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$userId = $_SESSION['user']['id'];

$errors = [];

if (!empty($_POST['add_description']) && !empty($_POST['add_amount']) && !empty($_POST['add_date']) && !empty($_POST['add_category']))
{
    $description = $_POST['add_description'];
    $amount = $_POST['add_amount'];
    $date = $_POST['add_date'];
    $category = $_POST['add_category'];
    
    echo $description . '<br>' . $amount . '<br>' . $date . '<br>' . $category;
} else {
    echo 'not all fields filled';
}

