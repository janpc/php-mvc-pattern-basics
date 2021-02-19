<?php
print_r($artist['artist_name'] . '<br><img src="' . $artist['picture'] . '"/><br>' . $artist['info'] . '<br>' . $artist['artist_id'] . '<br>');

foreach ($artist['songs'] as $song) {
    print_r($song['song_name'] . '<br><img src="' . $song['cover'] . '"/><br>');
}