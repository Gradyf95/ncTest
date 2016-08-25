<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$fullName = $_POST['fullName'];
$address = $_POST['address'];
$numKids = $_POST['numKids'];
$check = mysqli_query($con,"SELECT * FROM users where fullName='$fullName';");
$result = mysqli_fetch_array($check);

if($result){
    $update = mysqli_query($con, "UPDATE users SET address='$address', numKids=$numKids where fullName='$fullName';");
    if($update) {
        echo "true";
    }
}
else {
    echo "false";
}
mysqli_close($con);
?>
