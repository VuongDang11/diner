<?php

/* diner/model/validation.php
 * Validate user input from the diner app
 *
 */

// Food must have at least 2 characters
function validFood($food) {
    /*if(strlen(trim($food)) >= 2) {
        return true;
    }
    else {
        return false;
    }*/

    return strlen(trim($food)) >= 2;
}

//Validate meal
function validMeal($meal) {
   return in_array($meal, getMeals());
}