<?php

require_once "../controller/indexController.php";
require_once "../controller/errorController.php";

// Récupère l'url actuelle
$requestUri = $_SERVER['REQUEST_URI'];

// Découpe l'url actuelle pour ne récupérer que la fin
// Si l'url demandée est "http://localhost:8888/ecommerce2.php/public/test"
// $endUri contient "test"
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/ecommerce2.php/public/', '', $uri);
$endUri = trim($endUri, '/');

// En fonction de la valeur de $endUri on charge le bon contrôleur
if ($endUri === "order") {
    $indexController = new IndexController();
    $indexController->index();
} else {
    $errorController = new ErrorController();
    $errorController->notFound();
}
