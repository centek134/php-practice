<?php
    require "../helpers.php";
    require basePath("Router.php");
    require basePath("Database.php");

    //Instatiating the router
    $router = new Router();

    //Get routes
    $routes = require basePath("routes.php");

    //Get current uri and http method
    $uri = $_SERVER["REQUEST_URI"];
    $method = $_SERVER["REQUEST_METHOD"];

    //Route the request
    $router ->route($uri,$method);

?>