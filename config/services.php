<?php
/**
 * This file contains the config/services.php for the project WS-0000-A.
 * Based on work learned in the Udemy class "Write PHP Like a Pro: Build a
 * PHP MVC Framework From Scratch" taught by Dave Hollingworth.
 *
 * File information:
 * Project Name: WS-0000_A
 * Module Name: config
 * File Name: services.php
 * File Author: Troy L Marker
 * Language: PHP 8.3
 *
 * File Copyright: 01/2024
 */
$container = new Framework\Container;

$container->set(App\Database::class, function() {
    return new App\Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
});

$container->set(Framework\TemplateViewerInterface::class, function() {
    return new Framework\MVCTemplateViewer;
});

return $container;