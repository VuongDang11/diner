<?php

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function () {
      //  echo "Breakfast Project";

      $view = new Template();
      echo $view->render('views/home.html');
});

// Define  a breakfast route
$f3->route('GET /breakfast', function () {
    //  echo "Breakfast Project";

    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
});

// Define  a lunch route
$f3->route('GET /lunch', function () {
    //  echo "Breakfast Project";

    $view = new Template();
    echo $view->render('views/lunch.html');
});

//Define an orderForm1 route
$f3->route('GET /order', function () {
    //echo "Order page";

    $view = new Template();
    echo $view->render('views/orderForm1.html');
});

//Define an orderForm2 route
$f3->route('POST /order2', function () {
    //echo "Order page";
    var_dump($_POST);
    $view = new Template();
    echo $view->render('views/orderForm2.html');
});

//Define an orderSummary route
$f3->route('POST /summary', function () {
    //echo "Order page";
    var_dump($_POST);
    $view = new Template();
    echo $view->render('views/orderSummary.html');
});



//Run fat free
$f3->run();

