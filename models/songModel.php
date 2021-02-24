<?php

function getAll()
{
    $data = null;

    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    if ($database->connect_errno) {
        echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }

    if ($result = $database->query("SELECT * FROM songs")) {
        $data = [];
        foreach ($result as $song) {
            if ($artist = $database->query("SELECT * FROM artist_song INNER JOIN artists ON artist_song.artist_id = artists.artist_id WHERE `song_id` = " . $song['song_id'])) {
                $song['artist'] = $artist;
            }
            array_push($data, $song);
        }
    } else {
        return "Error getting the music information.";
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
    if ($result = $database->query("SELECT * FROM `songs` WHERE `song_id` =" . $id)) {
        $data = $result->fetch_assoc();
        if ($artist = $database->query("SELECT * FROM artist_song INNER JOIN artists ON artist_song.artist_id = artists.artist_id WHERE `song_id` = " . $id)) {
            $data['artist'] = $artist;
        }
    } else {
        return "Error getting the song information.";
    }

    $database->close();

    return $data;
}

function getArtists()
{
    $data = null;

    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    if ($database->connect_errno) {
        return "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }
    if ($result = $database->query("SELECT * FROM artists ORDER by artist_name")) {
        $data = $result;
    } else {
        return "Error getting the artists information.";
    }

    $database->close();

    return $data;
}

function add($name, $cover, $album, $artists, $song)
{
    $songName = $song['name'];
    $uploadError = uploadFile($song);

    if ($uploadError) {
        return $uploadError;
    } else {
        $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");
        if ($database->connect_errno) {
            return "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
        }

        $result = $database->query("INSERT INTO songs (song_name, cover, src, album) VALUES ('" . $name . "', '" . $cover . "',  '" . $songName . "', '" . $album . "')");

        if ($result) {
            $res = $database->query("SELECT song_id FROM `songs` WHERE song_name ='" . $name . "' ORDER by song_id DESC LIMIT 1");
            $id = $res->fetch_assoc()['song_id'];

            $query = "INSERT INTO artist_song (song_id, artist_id) VALUES ";
            foreach ($artists as $artist) {
                $query .= "(" . $id . ", " . $artist . "),";
            }
            $query = substr($query, 0, -1);

            if ($database->query($query)) {
                return null;
            }
        } else {
            return "Error setting the song information.";
        }

        $database->close();
    }
}

function update($id, $name, $cover, $album, $artists){
    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    if ($database->connect_errno) {
        return "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }

    $query = "UPDATE songs SET song_name = '" . $name . "', cover = '" . $cover . "', album = '" . $album . "' WHERE song_id = '" . $id . "'";

    if ($database->query($query)) {
        
        $query = "SELECT * FROM `artist_song` WHERE song_id = " . $id;
        if ($actualArtists = $database->query($query)) {
            $haveToDelete = false;
            $delete = "DELETE FROM artist_song WHERE song_id = " . $id . " AND artist_id IN (";
            if( $actualArtists!= null ){
                foreach ($actualArtists as $actualArtist){
                    $isInside = false;
                    foreach($artists as $artist){
                        if($artist == $actualArtist['artist_id']){
                            $isInside=true;
                            break;
                        }
                    }
                    if(!$isInside){
                        $delete .= $actualArtist['artist_id'] .", ";
                        $haveToDelete = true;
                    }
                }
                $delete = substr($delete, 0, -2);
                $delete .= ")";

                if($haveToDelete){
                    if(!$database->query($delete)){
                       return "Error upadating the artists1.";
                    }
                }
                $add = "INSERT INTO artist_song (song_id, artist_id) VALUES ";
                $haveToAdd = false;
                foreach ($artists as $artist){
                    $isInside = false;
                    foreach($actualArtists as $actualArtist){
                        if($artist == $actualArtist['artist_id']){
                            $isInside=true;
                            break;
                        }
                    }
                    if(!$isInside){
                        $add .= "(" . $id . ", " . $artist . "), ";
                        $haveToAdd = true;
                    }
                }

                $add = substr($add, 0, -2);
                if($haveToAdd){
                    if($database->query($add) ){
                        return null;
                    } else {
                        return $add;
                        return "Error upadating the artists.";
                    }
                }else{
                    return null;
                }
            }
        }else {
            return "Error upadating the song information.";
        }
    } else {
        return "Error upadating the song information.";
    }

    $database->close();
}

function delete($id){
    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    if ($database->connect_errno) {
        echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }

    $query = "DELETE FROM songs WHERE song_id = '" . $id . "'";

    if ($database->query($query)) {
        return null;
    } else {
        return "Error getting the deleting song.";
    }

    $database->close();
}



function uploadFile($song)
{
    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($song['error']) ||
            is_array($song['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['fileInput']['error'] value.
        switch ($song['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        if (!move_uploaded_file(
            $song['tmp_name'],
            './music/' . $song['name']
        )) {
            throw new RuntimeException('Failed to upload file.');
        }


        return null;
    } catch (RuntimeException $e) {

        return $e->getMessage();
    }
}
