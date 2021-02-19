<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

include_once "config/constants.php";

// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.

if( isset( $_GET['controller'] ) && file_exists (  CONTROLLERS . $_GET['controller'] . 'Controller.php')){

    $controller = CONTROLLERS . $_GET['controller'] . 'Controller.php';
    include $controller;

    /* call_user_func('include', $controller); */

}else{
    $main = VIEWS . 'main/main.php';
    include $main;

}

