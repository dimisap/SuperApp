<?php 

$servername = "localhost";
$user = "root";
$password = "";
$name = "users";

// Create connection
$conn = mysqli_connect($servername,$user,$password,$name);

if(mysqli_connect_error()){
    die ("Error");
}
?>