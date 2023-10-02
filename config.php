<?php
$DB_NAME = "db_musiclist100223";
$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD) or die("Could not connect");
mysqli_select_db($conn, $DB_NAME) or die("Error in selecting database!\n" . mysqli_error($conn));


?>