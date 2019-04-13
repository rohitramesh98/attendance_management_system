<?php
    $hostname='localhost';
    $username='root';
    $password='';
    $databaseName='attendance';

    $mysqli = new mysqli($hostname, $username, $password, $databaseName);
    
    if($mysqli->connect_error){
        echo "databse connection not successful....<br>";
    }
    else{
        echo "database connection successful...<br>";
    }
?>