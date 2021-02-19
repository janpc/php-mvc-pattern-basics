<?php
print_r($song['song_name'] . '<br><audio controls><source src="' . './music/' . $song['src'] . '"type="audio/mpeg" /></audio><br><img src="' . $song['cover'] . '"/><br>' . $song['album'] . '<br>' . $song['song_id'] . '<br>');

foreach ($song['artist'] as $artist) {
    print_r($artist['artist_name'] . '<br><img src="' . $artist['picture'] . '"/><br>' . $artist['info'] . '<br>');
}