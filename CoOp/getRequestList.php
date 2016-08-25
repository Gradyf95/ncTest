<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$requester = $_POST['requester'];
$check = mysqli_query($con,"SELECT * FROM requests where requester!='$requester' and  accepter='';");


if($check) {
    while($row = mysqli_fetch_array($check)) {
        echo "{$row['date']}," . "{$row['requester']}," . "{$row['numKids']}," . "{$row['numHours']}<br>";
    }
}

mysqli_close($con);
?>
