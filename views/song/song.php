<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo '<title>' .$song['song_name'] . '</title>';
    ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/song.css">
    <script defer src="assets/js/playSongs.js"></script>
    
</head>
<body>
    <?php
        include './assets/html/header.html';
        echo '<div class="mainSong" >
                <div class="mainSong__image" style="background-image: url(' . $song["cover"] . ');" href="index.php?controller=song&id='. $song["song_id"] . '">
                    <div class="mainSong__play__background">
                        <button id="mainSongPlay" class="material-icons mainSong__play" data-src="' . './music/' . $song["src"] .'">play_arrow</button>
                    </div>
                </div>
                <h2 class="mainSong__title">' .
                    $song["song_name"]
                . '</h2>
                <div class="mainSong__artist__list">';

        foreach ($song['artist'] as $artist) {
            echo "<a class='mainSong__artist'  href='index.php?controller=artist&id=". $artist['artist_id'] . "'>
                    <div class='mainSong__artists__picture' style='background-image: url(" . $artist['picture'] . ");'></div>
                    <p class='mainSong__artists__name'>" . $artist['artist_name'] . "</p>
                </a>";
        }
        echo "</div></div>";
        echo "<a class='material-icons editButton' href='index.php?controller=song&action=showFormUpdate&id=" . $song['song_id'] . "'> edit </a>";
    ?>
</body>
</html>