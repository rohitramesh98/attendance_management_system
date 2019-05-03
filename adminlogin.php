<html>
    <head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <style>
        #bc{
              height: 43px;
              width: 480px;
              padding: 20px;
            }
        .a12{
              padding: 10px;
                margin: 8% auto 50%;
                display: table;
                height: 250px;
                /*position: relative;*/
                overflow: hidden;
                width: 700px;
                background-image:url("form.jpg");
                background-repeat: repeat-x;
                background-size: contain;
                
            }
            input[type=submit]
            {
                padding:10px 215px;
                font-weight: bold;
                background-color: 00ffff;
                text-transform: uppercase;
                text-align: center;
            }
        </style>
    </head>
    <body>
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
      echo '<div class="alert alert-danger alert-dismissible fade show" style="text-align:center;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> Username or password is invalid!  </div>';
    }  
}  
?>  
        <div align="center" class="a12">
       <h2><p><font color="white">ADMIN DETAILS</font></p></h2>
        <br>
        <form action="adminlogin.php" method="post">
            <div align="left" style="float: left"><br>
              <font color="white">
                Username* <br><br><br>  
                Password* <br><br><br>  
              </font>
            </div>
            <div align="left" style="float: right">
            <input type="text" placeholder="username"  id="bc"  required name="username"><br><br>
            <input type="password" placeholder="password"  id="bc"  required name="password"><br><br>
            <input type="submit" name="login" value="LOGIN">
            </div>
        </form>
        </div>
    </body>    
</html>