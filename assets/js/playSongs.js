$playButton = document.getElementById('mainSongPlay');

$playButton.addEventListener( 'click', togglePlay );

const song = new Audio( $playButton.dataset.src );

function togglePlay(){
    if( $playButton.innerHTML == 'pause'){
        $playButton.innerHTML = 'play_arrow';
        song.pause();
    }else{
        $playButton.innerHTML = 'pause';
        song.play();
    }
    
}