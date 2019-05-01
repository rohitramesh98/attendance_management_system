
<?php include_once("connection.php");


if(isset($_POST['submit'])){
        $admno = $_POST['admno'];
        $rollno = $_POST['rollno'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $batch = $_POST['batch'];
        $number = $_POST['number'];
        $gender = $_POST['gender'];
        $date = date('Y:m:d');
        $password = $admno;
    
        if(empty($admno) || empty($rollno) || empty($name) || empty($batch) || empty($number) || empty($gender)){
            echo "some fields are empty...";
         }
        else{
            $flag=0;
            $query = "SELECT admno FROM student";
            $data = mysqli_query($mysqli, $query);
            while($row=mysqli_fetch_array($data))
            {
                    if($row['admno']==$admno)
                    {$flag=1;}
            }
            
            if($flag==1)
            {
                echo "STUDENT ADMISSION NUMBER ALREADY EXIST...!!!!!CHECK THE CREDENTIALS.";
            }
            else{
            $sql ="INSERT INTO student (admno, password, rollno, name, fname, batch, number, gender, date) VALUES ('$admno', '$password','$rollno', '$name', '$fname', '$batch', '$number', '$gender', '$date')";
            if($mysqli->query($sql)){
                echo "data inserted successfully...<br>";
            }
            else{
                echo "data not inserted successfully...<br>";
            }
                $sql ="ALTER TABLE web ADD `$rollno` INT(5)";
                if($mysqli->query($sql)){
                echo "TABLE ALTERED successfully...<br>";
            }
                else{
                    echo "table not ALTERED successfully...<br>";
                }
                
        }    
        }
    }

?>
