<?php  include("connection.php"); ?>

<?php
  
if(isset($_POST['login']))  
{  
    $user_name=$_POST['username'];  
    $user_pass=$_POST['password'];  
  
    $check_user="SELECT * FROM admin WHERE username='$user_name'AND password='$user_pass'";  
  
    $run=mysqli_query($mysqli,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        session_start();
        echo "<script>window.open('admin.html','_self')</script>";  
  
        $_SESSION['username']=$user_name;//here session is used and value of $username store in $_SESSION.  
  
    }  
    else  
    {  
      echo "<script>alert('username or password is incorrect!')</script>";  
    }  
}  
?>  