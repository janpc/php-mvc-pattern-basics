<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add song</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/addSong.css">
    
</head>
<body>
    <?php
        include './assets/html/header.html';

        if(!isset($song)){
            echo "<section class='addSong'>
            <form action='index.php?controller=song&action=add' method='post' enctype='multipart/form-data'>
                <label for='name'>Song name:</label><br>
                <input type='text' id='name' name='name' maxlength='50' required><br>
                <label for='cover'>Cover link:</label><br>
                <input type='text' id='cover' name='cover' maxlength='250' required><br>
                <label for='album' >Album:</label><br>
                <input type='text' id='album' name='album' maxlength='50' required><br>
                <label for='artists'>Artists:</label><br>
                <select name='artists[]' id='artists' multiple required>";
            foreach ($artists as $artist) {
                echo "<option value='" . $artist['artist_id'] . "'>" . $artist['artist_name'] . "</option>";
            }

            echo "</select><br>
                    <label for='song'>Select a song...</label><br>
                    <input id='song' name='song' type='file'><br><br>
                    <input type='submit' value='Submit'>
                </form>
                </section>";
        } else{
            echo "<section class='addSong'>
            <form action='index.php?controller=song&action=update&id=" . $song['song_id'] . "' method='post' enctype='multipart/form-data'>
                <label for='name'>Song name:</label><br>
                <input type='text' id='name' name='name' maxlength='50' value='" . $song['song_name'] . "' required><br>
                <label for='cover'>Cover link:</label><br>
                <input type='text' id='cover' name='cover' maxlength='250' value='" . $song['cover'] . "' required><br>
                <label for='album' >Album:</label><br>
                <input type='text' id='album' name='album' maxlength='50' value='" . $song['album'] . "' required><br>
                <label for='artists'>Artists:</label><br>
                <select name='artists[]' id='artists' multiple required>";
            foreach ($artists as $artist) {
                $isSelected = false;
                foreach($song['artist'] as $selected){
                    if($selected['artist_id'] == $artist['artist_id']){
                        $isSelected = true;
                    }
                }
                if($isSelected){
                    echo "<option value='" . $artist['artist_id'] . "' selected>" . $artist['artist_name'] . "</option>";
                }else{
                    echo "<option value='" . $artist['artist_id'] . "'>" . $artist['artist_name'] . "</option>";
                }
                
            }

            echo "</select><br>
                    <input type='submit' value='Submit'>
                </form>
                </section>";
            echo "<a class='material-icons deleteButton' href='index.php?controller=song&action=delete&id=" . $song['song_id'] . "'> delete </a>";
        }
        
    ?>
</body>
</html>