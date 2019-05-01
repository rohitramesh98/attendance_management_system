<?php  
include 'studview.php';
session_start();
$user_name = $_SESSION['admno'];
$query = "SELECT admno, name, fname, number, gender FROM student WHERE admno='$user_name'";
$data = mysqli_query($mysqli, $query);
$total=mysqli_num_rows($data);
echo $total;
$result = mysqli_fetch_assoc($data);
echo "<br>".$result['admno']." ".$result['name']." ".$result['fname']." ".$result['number']." ".$result['gender']." ";

?>