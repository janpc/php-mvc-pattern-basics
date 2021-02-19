<?php
foreach ($data as $artist) {
    print_r('<img src="' . $artist['picture'] . '"/><br><a href="index.php?controller=artist&id='. $artist['artist_id'] . '">'. $artist['artist_name']. '</a><br><p>' . $artist['info'] . '</p>');
}