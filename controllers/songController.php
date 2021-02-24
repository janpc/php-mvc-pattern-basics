<?php

require_once MODELS . "songModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'formAdd') {
        showFormAdd();
    } else if ($_GET['action'] == 'add') {
        addSong();
    } else if ($_GET['action'] == 'formUpdate') {
        showFormUpdate($_GET['id']);
    } else if ($_GET['action'] == 'update') {
        updateSong($_GET['id']);
    } else if ($_GET['action'] == 'delete') {
        deleteSong($_GET['id']);
    }
} else if (isset($_GET['id'])) {
    getSongs($_GET['id']);
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
function getSongs($id)
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

function addSong()
{
    $error = add($_POST['name'], $_POST['cover'], $_POST['album'], $_POST['artists'], $_FILES["song"]);

    if ($error != null) {
        error($error);
    } else {
        header('Location: index.php?controller=song');
    }
}

function showFormUpdate($id)
{

    $song = getById($id);
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

function updateSong($id)
{
    $error = update($id, $_POST['name'], $_POST['cover'], $_POST['album'], $_POST['artists']);

    if ($error != null) {
        error($error);
    } else {
        header('Location: index.php?controller=song');
    }
}

function deleteSong($id)
{
    $error = delete($id);

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
