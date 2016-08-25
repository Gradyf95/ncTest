<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$requester = $_POST['requester'];
$accepter = $_POST['accepter'];
$date = $_POST['date'];
$points = $_POST['points'];
$check = mysqli_query($con,"SELECT * FROM requests where requester='$requester' and accepter='$accepter' and date='$date';");
$result = mysqli_fetch_array($check);

if($result){
    $update = mysqli_query($con, "UPDATE users SET points=points-$points where fullName='$requester';");
    if($update) {
         $update = mysqli_query($con, "UPDATE users SET points=points+$points where fullName='$accepter';");
         if($update) {
             $update = mysqli_query($con, "Delete from requests where requester='$requester' and accepter='$accepter' and date='$date';");
             if($update) {
                 echo "true";
             }
         }
    }
}
else {
    echo "false";
}
mysqli_close($con);
?>
