<?php
    include('./config.php');
    $name=$_POST['name'];
    $album=$_POST['album'];
    $genre=$_POST['genre'];
    $artist=$_POST['artist'];
    $year=$_POST['year'];

    $query = "INSERT INTO songs(`name`, album, genre, artist, `year`) VALUES('$name','$album','$genre','$artist','$year')";
    $result = mysqli_query($conn, $query);

    if ($result > 0) {
        header("Location: index.php");
    }
    else {
        echo "Error while adding new song..";
    }
?>
