<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/addArtist.css">
    
</head>
<body>
    <?php
        include './assets/html/header.html';

        echo "<section class='addArtist'>
            <form action='index.php?controller=artist&action=add' method='post' enctype='multipart/form-data'>
                <label for='name'>Name:</label><br>
                <input type='text' id='name' name='name' maxlength='50' required><br>
                <label for='image'>Image link:</label><br>
                <input type='text' id='image' name='image' maxlength='250' required><br>
                <label for='info'>Info:</label><br>
                <textarea id='info' name='info' ></textarea><br>
                <input type='submit' value='Submit'>
            </form>
            </section>";
    ?>
</body>
</html>