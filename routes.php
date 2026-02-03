<?php

// Base Pages
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contacts', 'contacts.php');

// ---------- Notes sadaļa ----------
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');
$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes/create', 'notes/store.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');

//Registration
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

//Login
$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->delete('/login', 'login/destroy.php')->only('auth');


