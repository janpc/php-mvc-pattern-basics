<?php

function getAll(){
    $data = null;

    /* initialize mysli */
    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    /* Check posible errors */
    if ($database->connect_errno) {
        echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }

    /* Consultas de selección que devuelven un conjunto de resultados */
    if ($result = $database->query("SELECT * FROM songs")) {
        $data = [];
        foreach($result as $song){
            if( $artist = $database->query("SELECT * FROM artist_song INNER JOIN artists ON artist_song.artist_id = artists.artist_id WHERE `song_id` = " . $song['song_id'])){
                $song['artist'] = $artist;
            }
            array_push($data, $song);
        }
    }


    $database->close();

    return $data;

}

function getById($id){
    
    $data = null;

    /* initialize mysli */
    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");
    
    /* Check posible errors */
    if ($database->connect_errno) {
        echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }
    /* Consultas de selección que devuelven un conjunto de resultados */
    if ($result = $database->query("SELECT * FROM `songs` WHERE `song_id` =" . $id)) {
        $data = $result->fetch_assoc();
        if( $artist = $database->query("SELECT * FROM artist_song INNER JOIN artists ON artist_song.artist_id = artists.artist_id WHERE `song_id` = " . $id)){
            $data['artist'] = $artist;
        }
    }


    $database->close();

    return $data;
}