<?php
/**
 * This file contains the config/routes.php for the project WS-0000-A.
 * Based on work learned in the Udemy class "Write PHP Like a Pro: Build a
 * PHP MVC Framework From Scratch" taught by Dave Hollingworth.
 *
 * File information:
 * Project Name: WS-0000-A
 * Module Name: config
 * File Name: routes.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 01/2024
 */
$router = new Framework\Router;

$router->add(path: "/admin/{controller}/{action}", params: ["namespace" => "Admin"]);
$router->add(path: "/{title}/{id:\d+}/{page:\d+}", params: ["controller" => "products", "action" => "showPage"]);
$router->add(path: "/product/{slug:[\w-]+}", params: ["controller" => "products", "action" => "show"]);

$router->add(path: "/{controller}/show/{id:\d+}", params: ["action" => "show"]);
$router->add(path: "/{controller}/{id:\d+}/edit", params: ["action" => "edit"]);
$router->add(path: "/{controller}/{id:\d+}/update", params: ["action" => "update"]);
$router->add(path: "/{controller}/{id:\d+}/delete", params: ["action" => "delete"]);
$router->add(path: "/{controller}/{id:\d+}/destroy", params: ["action" => "destroy", "method" => "post"]);

$router->add(path: "/home/index", params: ["controller" => "home", "action" => "index"]);
$router->add(path: "/products", params: ["controller" => "products", "action" => "index"]);
$router->add(path: "/", params: ["controller" => "home", "action" => "index"]);
$router->add(path: "/{controller}/{action}");

return $router;