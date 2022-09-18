<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="explorer";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

// Check connection
if (!$conn) {

    echo "Connection failed!";

}