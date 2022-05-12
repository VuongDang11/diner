<?php

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);


//Start a session
session_start();


//Require the autoload file
require_once('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validate.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function () {
      //  echo "Breakfast Project";

      //Add meal data to hive

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

//Define an order route
$f3->route('GET|POST /order', function($f3) {
    //echo "Order page";

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move orderForm1 data from POST to SESSION
        var_dump ($_POST);

        //Get the food from the post array
        $food = $_POST['food'];

        //Get the meal from the post

        //Option1
        $meal = "";
        if(isset($_POST['meal'])) {
            $meal = $_POST['meal'];
        }

        //Option2
        $meal = isset($_POST['meal']) ? $_POST['meal'] : "";

        //If data is valid
        if (validFood($food)) {

            //Store it in the session array
            $_SESSION['food'] = $food;


        }
        //Data is not valid -> store an error message
        else {
            $f3->set('errors["food"]', 'Please enter a food at least 2 characters');
        }

        if(validMeal($meal)) {

            //Store it in the session array
            $_SESSION['food'] = $food;

        }
        //Data is not valid -> store an error message
        else {
            $f3->set('errors["meal"]', 'Meal selection is not valid!');
        }

        //Redirect to order2 route if there are no errors
        if(empty($f3->get('errors'))) {
            header('location: order2');
        }

        // $_SESSION['meal'] = $_POST['meal'];
    }


    //Add meal data to hive
    $f3->set('meals', getMeals());

    $view = new Template();
    echo $view->render('views/orderForm1.html');
});

//Define an order2 route
$f3->route('GET|POST /order2', function($f3) {
    //echo "Order page";



    //Add condiment data to hive
    $f3->set('condiments', getCondiments());

    $view = new Template();
    echo $view->render('views/orderForm2.html');
});


//Define a summary route -> orderSummary.html
$f3->route('GET|POST /summary', function() {
    //echo "Order page";
    var_dump ($_POST);
    if (empty($_POST['conds'])) {
        $conds = "none selected";
    }
    else {
        $conds = implode(", ", $_POST['conds']);
    }
    $_SESSION['conds'] = $conds;

    $view = new Template();
    echo $view->render('views/orderSummary.html');

    //Clear the session array
    session_destroy();
});



//Run fat free
$f3->run();

