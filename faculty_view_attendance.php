<?php
    include 'connection.php';
    
    session_start();
    $user_name = $_SESSION['username'];
//echo $user_name;
    $query = "SELECT subject FROM faculty WHERE username='$user_name'";
    $data = mysqli_query($mysqli, $query);
    $result = mysqli_fetch_assoc($data);
?>