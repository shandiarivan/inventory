<?php 
    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $nama_db= "db_inventory";

    $conn   = mysqli_connect($host,$user,$pass,$nama_db);

    if(!$conn){
        die("Error :".mysqli_error());
    }

?>