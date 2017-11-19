<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "reservation";
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if(mysqli_connect_error()){
        die("Database connection error ".mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }
    
?>