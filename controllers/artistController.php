<?php

require_once MODELS . "artistModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic
if (isset($_GET['action'])) {
    call_user_func($_GET['action'], $_REQUEST);
} else if (isset($_GET['id'])) {
    getArtist($_GET['id']);
} else {
    getAllArtists();
}


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllArtists()
{
    $data = getAll();

    if (gettype($data) == 'string') {
        error($data);
    } else {
        $view = VIEWS . 'artist/artistDashboard.php';
        include $view;
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getArtist($id)
{
    $artist = getById($id);

    if (gettype($artist) == 'string') {
        error($artist);
    } else {
        $view = VIEWS . 'artist/artist.php';
        include $view;
    }
}

function showFormAdd()
{
    $view = VIEWS . 'artist/addArtist.php';
    include $view;
}

function addArtist($REQUEST)
{
    $error = add($REQUEST['name'], $REQUEST['image'], $REQUEST['info']);
    if ($error == null) {
        header('Location: index.php?controller=artist');
    } else {
        error($error);
    }
}

function showFormUpdate($REQUEST)
{
    $artist = getById($REQUEST['id']);

    if (gettype($artist) == 'string') {
        error($artist);
    } else {
        $view = VIEWS . 'artist/addArtist.php';
        include $view;
    }
}

function updateArtist($REQUEST)
{
    $error = update($REQUEST['id'], $REQUEST['name'], $REQUEST['image'], $REQUEST['info']);
    if ($error == null) {
        header('Location: index.php?controller=artist');
    } else {
        error($error);
    }
}

function deleteArtist($REQUEST)
{
    $error = delete($REQUEST['id']);

    if ($error != null) {
        error($error);
    } else {
        header('Location: index.php?controller=artist');
    }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    $error = $errorMsg;
    include VIEWS . "error/error.php";
}
