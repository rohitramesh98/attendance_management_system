<?php  include("connection.php"); ?>

<?php
  
if(isset($_POST['login']))  
{  
    $user_name=$_POST['admno'];  
    $user_pass=$_POST['password'];  
  
    $check_user="SELECT * FROM student WHERE admno='$user_name'AND password='$user_pass'";
    echo "record found";
  
    $run=mysqli_query($mysqli,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        session_start();
        $_SESSION['admno']=$user_name;  
        echo "<script>window.open('studetails.php','_self')</script>";  
    }  
    else  
    {  
      echo "<script>alert('username or password is incorrect!')</script>";  
    }  
}  
?>  