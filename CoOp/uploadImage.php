<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$fullName = $_POST['fullName'];
$image = $_POST['image'];
$imgName = "webco-op.netai.net/images/$fullName.jpg";
$check = mysqli_query($con,"SELECT * FROM users where fullName='$fullName';");
$result = mysqli_fetch_array($check);
$path = "images/$fullName.jpg";

if($result){
    $update = mysqli_query($con, "UPDATE images SET image='$path' where fullName='$fullName';");
    if($update) {
        file_put_contents($path, base64_decode($image));
        echo "true";
    }
}
else {
    echo "false";
}
mysqli_close($con);
?>
