<?php
/**
 * This file contains the App/Controllers/Home.php class for the project WS-0000-A.
 * Based on work learned in the Udemy class "Write PHP Like a Pro: Build a
 * PHP MVC Framework From Scratch" taught by Dave Hollingworth.
 *
 * File information:
 * Project Name: WS-0000-A
 * Module Name: App/Controllers
 * File Name: Home.php
 * File Author: Troy L Marker
 * Language: PHP 8.3
 *
 * File Copyright: 01/2024
 */
declare(strict_types=1);

namespace App\Controllers;

use Framework\Controller;

/**
 * Class Home
 *
 * This class represents the home page controller. It extends the Controller class.
 *
 * @noinspection PhpUnused
 */
class Home extends Controller {

    /**
     * The index method is responsible for rendering the header.php and index.php view files
     * and displaying them using the Viewer object.
     *
     * @return void
     *
     * @noinspection PhpUnused
     */
    public function index(): void {
        echo $this->viewer->render("shared/header.php", ["title" => "Home"]);
        echo $this->viewer->render("Home/index.php");
    }
}