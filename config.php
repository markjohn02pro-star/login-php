<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "imagegeneratedtool";

$connection = mysqli_connect($server, $username, $password, $database);

if(!$connection){
    die("connection failed" . mysqli_connect_error() );
    
}
else{
    // echo "Connection Successfully";
}
session_start();
?>