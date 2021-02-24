<?php

require_once MODELS . "songModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic
if (isset($_GET['action'])) {
    call_user_func($_GET['action'], $_REQUEST);
} else if (isset($_GET['id'])) {
    getSong($_GET['id']);
} else {
    getAllSongs();
}

//call_user_func($_REQUEST['action'], $_REQUEST);


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllSongs()
{
    $data = getAll();

    if (gettype($data) == 'string') {
        error($data);
    } else {
        $view = VIEWS . 'song/songDashboard.php';
        require_once $view;
    }


    //
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getSong($id)
{
    $song = getById($id);

    if (gettype($song) == 'string') {
        error($song);
    } else {
        $view = VIEWS . 'song/song.php';
        require_once $view;
    }
}

function showFormAdd()
{
    $artists = getArtists();

    if (gettype($artists) == 'string') {
        error($artists);
    } else {
        $view = VIEWS . 'song/addSong.php';
        require_once $view;
    }
}

function addSong($REQUEST)
{
    $error = add($REQUEST['name'], $REQUEST['cover'], $REQUEST['album'], $REQUEST['artists'], $_FILES["song"]);

    if ($error != null) {
        error($error);
    } else {
        header('Location: index.php?controller=song');
    }
}

function showFormUpdate($REQUEST)
{

    $song = getById($REQUEST['id']);
    $artists = getArtists();

    if (gettype($song) == 'string') {
        error($song);
    } else {
        if (gettype($artists) == 'string') {
            error($artists);
        } else {
            $view = VIEWS . 'song/addSong.php';
            require_once $view;
        }
    }
}

function updateSong($REQUEST)
{
    $error = update($REQUEST['id'], $REQUEST['name'], $REQUEST['cover'], $REQUEST['album'], $REQUEST['artists']);

    if ($error != null) {
        error($error);
    } else {
        header('Location: index.php?controller=song');
    }
}

function deleteSong($REQUEST)
{
    $error = delete($REQUEST['id']);

    if ($error != null) {
        error($error);
    } else {
        header('Location: index.php?controller=song');
    }
}


/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    $error = $errorMsg;
    require_once VIEWS . "error/error.php";
}
