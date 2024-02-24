<?php
/**
 * This file contains the config/middleware.php for the project WS-0000-A.
 * Based on work learned in the Udemy class "Write PHP Like a Pro: Build a
 * PHP MVC Framework From Scratch" taught by Dave Hollingworth.
 *
 * File information:
 * Project Name: WS-0000-A
 * Module Name: config
 * File Name: middleware.php
 * File Author: Troy L Marker
 * Language: PHP 8.3
 *
 * File Copyright: 01/2024
 */

use App\Middleware\ChangeRequestExample;
use App\Middleware\ChangeResponseExample;
use App\Middleware\RedirectExample;

return [
    "message" => ChangeResponseExample::class,
    "trim" => ChangeRequestExample::class,
    "deny" => RedirectExample::class
];