<?php

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Create an instance of the Base class
$f3->route('GET /', function () {
      //  echo "Breakfast Project";

      $view = new Template();
      echo $view->render('views/home.html');
});

// Define  a breakfast route
$f3->route('GET /breakfast', function () {
    //  echo "Breakfast Project";

    $view = new Template();
    echo $view->render('views/breakfast.html');
});

// Define  a breakfast route
$f3->route('GET /lunch', function () {
    //  echo "Breakfast Project";

    $view = new Template();
    echo $view->render('views/lunch.html');
});

//Run fat free
$f3->run();

