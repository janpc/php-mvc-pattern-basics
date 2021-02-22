<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/songDashboard.css">
    
</head>
<body>
    <?php
        include './assets/html/header.html';
        echo "<section class='songList'>";
        foreach ($data as $song) {
            echo "<article class='song' >
                    <a href='index.php?controller=song&id=". $song['song_id'] . "'>
                        <div class='song__image' style='background-image: url(" . $song['cover'] . ");' >
                        </div>
                    </a>
                    <a  class='song__title__link' href='index.php?controller=song&id=". $song['song_id'] . "'>
                        <h2 class='song__title' >" .
                            $song['song_name']
                        . "</h2>
                    </a>
                    <div class='song__artist__list'>";
             $artists ='';
            foreach ($song['artist'] as $artist) {
                $artists .= "<a class='song__artist'  href='index.php?controller=artist&id=". $artist['artist_id'] . "'>" . $artist['artist_name'] . "</a>, ";
            } 
            $artists = substr($artists, 0, -2);
            echo $artists;
            echo "</div></article>";
        }
        echo "</section>
        <a class='material-icons addButton' href='index.php?controller=song&action=formAdd'> add </a>";
    ?> 
</body>
</html>