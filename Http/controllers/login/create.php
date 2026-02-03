<?php
use Core\Session;

view("login/create.view.php", [
    'page' => 'Login',
    // 'errors' => $_SESSION['_flash']['errors'] ?? [],
    'errors' => Session::getFlash('errors')
    
]);