<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$date = $_POST['date'];
$requester = $_POST['requester'];
$numKids = $_POST['numKids'];
$numHours = $_POST['numHours'];
$time = $_POST['time'];
$check = mysqli_query($con,"SELECT * FROM requests where date='$date' and requester= '$requester';");
$result = mysqli_fetch_array($check);

if(!$result) {
    $sql = mysqli_query($con, "INSERT into requests values('$date', '$requester', '', $numKids, $numHours, '$time');");
    if($sql) {
        echo "true";
    }
    else {
        echo "false";
    }
}

mysqli_close($con);
?>
