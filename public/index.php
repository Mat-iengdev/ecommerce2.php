<?php

require_once "../controller/OrderController.php";
require_once "../controller/ErrorController.php";

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
    $orderController = new OrderController();
    $orderController->Order();
    // On rajoute un sinon si et la valeur add-product en fin d'url
} else if ($endUri === "add-product") {
    $orderController = new OrderController();
    $orderController->addProduct();
} else if ($endUri === "remove-product") {
    $orderController = new OrderController();
    $orderController->removeProduct();
} else if ($endUri === "set-shipping-address") {
    $orderController = new OrderController();
    $orderController->setShippingAddress();
} else if ($endUri === "pay") {
        $orderController = new OrderController();
        $orderController->pay();
} else {
    $errorController = new ErrorController();
    $errorController->notFound();
}
