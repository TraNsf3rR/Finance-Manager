<?php
use Core\App;
use Core\Database;
use Core\Container;

$container = new Container();

$container->bind('Core\Database', function () {

    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container);

try {
    $db = App::resolve('Core\Database');
} catch (Exception $e) {
    echo "<!DOCTYPE html><html><head><title>Error</title></head><body><h1>" . $e->getMessage() . "</h1></body></html>";
    exit;
}
