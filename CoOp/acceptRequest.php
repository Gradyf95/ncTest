<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$requester = $_POST['requester'];
$accepter = $_POST['accepter'];
$date = $_POST['date'];
$check = mysqli_query($con,"SELECT * FROM requests where requester='$requester' and date='$date';");
$result = mysqli_fetch_array($check);


if($result){
    $update = mysqli_query($con, "UPDATE requests SET accepter='$accepter' where requester='$requester' and date='$date';");
    echo "true";
}
else {
    echo "false";
}
mysqli_close($con);
?>
