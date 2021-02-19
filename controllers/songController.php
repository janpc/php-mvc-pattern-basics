<?php

require_once MODELS . "songModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic
if( isset( $_GET['id'] ) ){
    getSongs( $_GET['id'] );
}else{
    getAllSongs();
}


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllSongs()
{
    $data = getAll( );
    foreach( $data as $employee ){
        print_r( $employee['first_name'] . '<br>' );
    }
    //
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getSongs($id)
{
    echo 'Songs: ' . $id;
    //
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}