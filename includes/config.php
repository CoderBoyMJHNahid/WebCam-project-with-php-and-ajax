<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "image_data";

    $conn = mysqli_connect($host,$username,$password,$db_name) or die("Your connection has been failed!!". mysqli_connect_error());
