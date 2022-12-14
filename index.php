<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

//for error handle
set_exception_handler("ErrorHandler::handleException");
header("Content-type: application/json; charset=UTF-8");

$parts = explode("/",$_SERVER["REQUEST_URI"]);

// print_r($parts);

if($parts[1] != "dbeeta_PHP_MySQL_Android"){
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$database = new Database("localhost", "dbeeta", "root", "");

$database -> getConnection();

$gateway = new ProductGateway($database);

$controller = new ProductController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);

?>