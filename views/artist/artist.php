<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo '<title>' .$artist['artist_name'] . '</title>';
    ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/artist.css">
    
</head>
<body>
    <?php
        include './assets/html/header.html';

        echo "<section class='artist' >
                <div class='artist__img' style='background-image: url(" . $artist['picture'] . ");'>
                </div>
                <div class='artist__info'>
                    <h1 class='artist__info__name'>" .$artist['artist_name'] . "</h1>
                    <p class='artist__info__bio'>" . $artist['info'] . "</p>
                </div>
            </section>
            <div class='artist__songs__container'>";
        foreach ($artist['songs'] as $song) {
            echo "<a class='artist__song' href='index.php?controller=song&id=" . $song['song_id'] . "'>
                    <div class='artist__song__img' style='background-image: url(" . $song['cover'] . ");'>
                    </div>
                    <h2 class='artist__song__name'>" . $song['song_name'] . "</h2>
                </a>";
        }

        echo "</div>";
        echo "<a class='material-icons editButton' href='index.php?controller=artist&action=showFormUpdate&id=" . $artist['artist_id'] . "'> edit </a>";


        
    ?>
</body>
</html>