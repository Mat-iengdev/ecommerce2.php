<?php

class ErrorController {

    public function notFound(): void {
        require "../view/error404.php";
    }
}