
<?php include_once("connection.php");


if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $subject = $_POST['subject'];
        $number = $_POST['number'];
        $gender = $_POST['gender'];
        $date = date('Y:m:d');
        
        if(empty($name) || empty($username) || empty($password) || empty($subject) || empty($number) || empty($gender)){
            echo "some fields are empty...";
         }
        else{
            $sql ="INSERT INTO faculty (name, username, password, subject, number, gender, date) VALUES ('$name', '$username', '$password', '$subject', '$number', '$gender', '$date')";
            if($mysqli->query($sql)){
                echo "data inserted successfully...<br>";
            }
            else{
                echo "data not inserted successfully...<br>";
            }
        }
    }

?>
