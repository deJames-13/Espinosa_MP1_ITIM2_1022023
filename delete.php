<?php
    include('./config.php');
    
    $id = $_POST['song_id'];
    // print_r($_POST);
    
    $query = "DELETE FROM songs WHERE id='$id'";
    $result = mysqli_query($conn, $query);


    if ($result > 0) {
        header("Location: index.php");
    }
    else {
        echo "Error while deleting a song..";
    }
?>