<?php
include('./config.php');
$check = empty($_POST['name']) || empty($_POST['album']) || empty($_POST['genre']) || empty($_POST['artist']) || empty($_POST['year']);


if ($check) {
    header("Location: index.php");
    return;
}
$id = $_POST['id'];
$name = $_POST['name'];
$album = $_POST['album'];
$genre = $_POST['genre'];
$artist = $_POST['artist'];
$year = $_POST['year'];

$query = "UPDATE songs SET `name`='$name', album='$album', genre='$genre', artist='$artist', `year`='$year' WHERE id='$id'";
$result = mysqli_query($conn, $query);


if ($result > 0) {
    header("Location: index.php");
} else {
    echo "Error while updating song..";
}
