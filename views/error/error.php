<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="assets/css/error.css">
    
</head>
<body>
    <?php
        include './assets/html/header.html';
        print_r($error);
        echo "<section class='error'>" .
                $error
            . "</section>";
    ?>
</body>
</html>