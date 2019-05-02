<html>
<head> 
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <!--<link rel="stylesheet" href="styles.css">-->
    <title>attandence management system</title>
    <style>
        body{
            background-image: url(csit.jpg);
    background-size:1550px 768px;
    background-repeat: repeat-x; 
        
        }
        div#a {
  position: absolute;
            left: 50%;
}

div#b {
  
position: absolute;
            left: 25%;
}

div#c {
    padding: 5%
  text-align: left;
}
        
div#d {
  position: absolute;
            left: 85%;
}

        #e {
  position: absolute;
            left: 40%;
            background-color: #32383e;
            width:270px;
            height: 48px;
            padding: 10px;
}
        div#f {
            padding-top: 2%;
            padding-left: 10%;
            padding-right: 10%;
            padding-bottom: 5%;    
        }
       div#g {
                padding:10px 215px;
                font-weight: bold;
                background-color: 00ffff;
                text-transform: uppercase;
                text-align: center;
        }


    </style>
</head>
<body>    
<?php
    include 'connection.php';
//include 'facultylogin.php';
session_start();
$user_name = $_SESSION['username'];
//echo $user_name;
$query = "SELECT name,subject FROM faculty WHERE username='$user_name'";
$data = mysqli_query($mysqli, $query);
$result = mysqli_fetch_assoc($data);
    $date = date('Y-m-d h:i:sa');
    $subject = $result['subject'];
    $array = array();
    $arr = array();
?>
   
    <form action="take.php" method="post">
    <div id="nav_1">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
        <div id="c"><a class="navbar-brand" style="color:white"><?php echo "USER: ".$result['name']?></a></div>
        <div id="b"><a class="navbar-brand" style="color:white"><?php echo "SUBJECT: ".$result['subject']?></a></div>
        <div id="a"> <a class="navbar-brand" style="color:white"><?php echo "DATE: ".$date?></a></div>
        <div id="d"><a class="navbar-brand" href="logout.php">LOGOUT</a></div>
        </nav>
    </div><br>
    
    <div id="f">
    <h3 id="e" style="color:white">TAKE ATTENDANCE</h3><br><br>
    <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>#S.No:</th>
        <th>NAME</th>
        <th>ROLL NO.</th>
        <th>ATTENDANCE STATUS</th>  
      </tr>
    </thead>
        
        <?php
            $serialnumber=0;
            $counter=0;
            $query = "SELECT name, rollno FROM student ORDER BY rollno";
            $data = mysqli_query($mysqli, $query);
            $num = mysqli_num_rows($data);
            echo $num;
            while($row=mysqli_fetch_array($data)){
                $array[] = $row['rollno']; 
                $serialnumber++;
        ?>
        
    <tbody>
      <tr>
        <td><?php echo $serialnumber;?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['rollno'];?></td>
        <td><input type="radio" value="P" name="attendance[<?php echo $counter; ?>]">Present &nbsp;&nbsp; 
            <input type="radio" value="A" name="attendance[<?php echo $counter; ?>]">Absent</td>  
      </tr>
        <?php
                    
          $counter++;  }
            
        ?>        
    </tbody>
  </table>
        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>

    </div>
     <?php
   
        if(isset($_POST['submit'])){
             foreach($_POST['attendance'] as $id=>$attendance){
            $arr[] = $attendance;}
            $sql ="INSERT INTO web (date, subject) VALUES ('$date', '$subject')";
            if($mysqli->query($sql)){
                echo '<div class="alert alert-success alert-dismissible">
                      <class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> DATA INSERTED SUCCESSFULLY.
                       </div>';
                    $c=0;
                for($c=0;$c<$num;$c++){
                $rel = mysqli_query($mysqli, "UPDATE web SET `$array[$c]` = '$arr[$c]' WHERE `date` = '$date'");
                //$rel = $mysqli->query($sql);
                }
                if($rel){
                    echo '<div class="alert alert-success alert-dismissible">
                      <class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> DATA UPDATED SUCCESSFULLY.
                       </div>';
                    }
            }
            else{
                echo "data not inserted successfully...<br>";
            }
        }
        
    
    ?>
    
    
    
    
    
    
    <!--<div class="b" style="color:white"><?php echo "WECLOME: ".$result['name']?></div>
    <div class="a"><?php echo "SUBJECT: ".$result['subject'];?></div>
    <div class="c"><?php echo "DATE: ".$date;?></div>
    <div class="container">
        <h3><?php echo "<br>WECLOME: ".$result['name']." SUBJECT: ".$result['subject'];?></h3>
        <!--<?php// echo "<br>SUBJECT: ".$result['subject'];?>
        
    </div>-->    

    
    
    

    
    
    <?php
//echo "<br>".$result['subject'];
/*"<br>".$result['']
$query = "SELECT * FROM ".$result['subject'];
$dataa = mysqli_query($mysqli, $query);
$result = mysqli_fetch_assoc($dataa);
    
echo "<br>".$result['date']." ".$result['6']." ".$result['33']." ".$result['63'];
*/
?>
    </form>
</body>    
</html>