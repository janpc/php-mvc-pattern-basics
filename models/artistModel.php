<?php

function getAll()
{
    $data = null;

    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    if ($database->connect_errno) {
        return "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }

    if ($result = $database->query("SELECT * FROM artists")) {
        $data = $result;
    }

    $database->close();

    return $data;
}


function getById($id)
{
    $data = null;

    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    if ($database->connect_errno) {
        return "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }

    if ($result = $database->query("SELECT * FROM `artists` WHERE `artist_id` =" . $id)) {

        $data = $result->fetch_assoc();

        $songs = $database->query("SELECT * FROM artist_song INNER JOIN songs ON artist_song.song_id = songs.song_id WHERE `artist_id` =" . $id);

        if ($songs) {
            $data['songs'] = $songs;
        }
    } else{
        return "Error getting the artist information";
    }

    $database->close();

    return $data;
}

function add( $name, $image, $info){
    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    $query = "INSERT INTO artists (artist_name, picture, info) VALUES ('" . $name . "', '" . $image . "',  '" . $info . "')";

    if($database->query($query)){
        return null;
    }else{
        return "Error setting the artist information";
    }
}