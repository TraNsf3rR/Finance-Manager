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

// Add income
$router->post('/income', 'income/create.php')->only('auth');
$router->get('/income-sources', 'income/sources.php')->only('auth');
$router->post('/income-sources', 'income/sources.php')->only('auth');
$router->get('/income/edit', 'income/edit.php')->only('auth');
$router->patch('/income/update', 'income/update.php')->only('auth');
$router->delete('/income', 'income/delete.php')->only('auth');

// Add expense
$router->post('/expenses', 'expenses/create.php')->only('auth');
$router->get('/expenses/edit', 'expenses/edit.php')->only('auth');
$router->patch('/expenses/update', 'expenses/update.php')->only('auth');
$router->delete('/expenses', 'expenses/delete.php')->only('auth');

