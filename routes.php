<?php

// Base Pages
$router->get('/', 'index.php');
$router->get('/account', 'account.php')->only('auth');

// Login
$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->delete('/login', 'login/destroy.php')->only('auth');

// Registration
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

// Add expense

