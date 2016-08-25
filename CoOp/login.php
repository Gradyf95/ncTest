<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$email = $_POST['email'];
$password = $_POST['password'];
$result = mysqli_query($con,"SELECT firstName, lastName, numKids, address, points FROM users where email='$email' and password='$password'");
$row = mysqli_fetch_array($result);


if($row){
    $path = mysqli_query($con, "Select image from images where fullName='$row[0] $row[1]';");
    $actualPath = mysqli_fetch_array($path);
    if($actualPath[0] != "images/default.jpg") {
        $image = file_get_contents($actualPath[0]);
    }
    echo $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . ",";
    if($actualPath[0] != "images/default.jpg") {
        echo base64_encode($image);
    }
}
mysqli_close($con);
?>
