<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/artistDashboard.css">
    
</head>
<body>
    
    <?php
    include './assets/html/header.html';
    echo "<section class='artistsContainer'>";
    foreach ($data as $artist) {
        echo "<article class='artist'>
                <a href='index.php?controller=artist&id=". $artist['artist_id'] . "'>
                    <div class='artist__image' style='background-image: url(" . $artist['picture'] . ");' >
                    </div>
                </a>
                <a class='artist__name__container' href='index.php?controller=artist&id=". $artist['artist_id'] . "'>
                    <h2 class='artist__name'>" . $artist['artist_name'] . "</h2>
                </a>
            </article>";

        /* print_r('<img src="' . $artist['picture'] . '"/><br><a href="index.php?controller=artist&id='. $artist['artist_id'] . '">'. $artist['artist_name']. '</a><br><p>' . $artist['info'] . '</p>'); */
    }
    echo "</section>";
    ?>
    
</body>
</html>