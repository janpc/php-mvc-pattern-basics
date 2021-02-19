<?php

require_once MODELS . "artistModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic
if( isset( $_GET['id'] ) ){
    getArtist( $_GET['id'] );
}else{
    getAllArtists();
}


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllArtists()
{
    echo 'all Artists';
    //ToDO implement the logic
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getArtist($id)
{
    echo 'Artists: ' . $id;
    //ToDO implement the logic
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "error/error.php";
}
