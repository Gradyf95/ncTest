<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$numKids = $_POST['numKids'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$check = mysqli_query($con,"SELECT * FROM users where email='$email' and password='$password';");
$result = mysqli_fetch_array($check);

if(!$result) {
    $sql = mysqli_query($con, "INSERT into users values('$firstName', '$lastName', '$firstName $lastName', $numKids, '$email', '$password', '$address', 0);");
    if($sql) {
        $sql = mysqli_query($con, "Insert into images values('$firstName $lastName', 'images/default.jpg');");
        if($sql) {
            echo "true";
        }
    }
    else {
        echo "false";
    }
}
else {
    echo "false";
}



mysqli_close($con);
?>
