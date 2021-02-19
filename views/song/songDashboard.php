<?php
foreach ($data as $song) {
    print_r($song['song_name'] . '<br><audio controls><source src="' . './music/' . $song['src'] . '"type="audio/mpeg" /></audio><br><img src="' . $song['cover'] . '"/><br>' . $song['album'] . '<br>' . $song['song_id'] . '<br>');
    foreach( $song['artist'] as $artist ){
        print_r( '<a href="index.php?controller=artist&id='. $artist['artist_id'] . '">'. $artist['artist_name']. '</a><br>');
    }
}