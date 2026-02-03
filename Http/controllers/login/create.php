<?php
use Core\Session;

view("login/create.view.php", [
    'errors' => Session::getFlash('errors')
]);