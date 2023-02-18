<?php

function db_connection(){

    $hostname = "localhost";
    $username = "root";
    $password = "";

    $connect = mysqli_connect($hostname, $username, $password);

    if(!$connect){
        die("Could not Connect: " . mysqli_connect_error());
    } 

    $dbname = "my_project";
    mysqli_select_db($connect, $dbname);

    return $connect;

}

?>