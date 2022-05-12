<?php


/* diner/model/data-layer.php
  * returns data for diner app
*/

// Get the meals for the order form
function getMeals() {
    return array("breakfast", "brunch",  "lunch", "dinner");
}

function getCondiments() {
    return array("ketchup", "mayo", "mustard", "sriracha", "kimchi");
}