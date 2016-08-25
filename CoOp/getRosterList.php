<?php
$con=mysqli_connect("sql3.freemysqlhosting.net","sql3127303","74lFDDaM8r","sql3127303");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_POST['user'];

$check = mysqli_query($con,"SELECT * FROM users where fullName!='$user' order by fullName asc;");
$query = mysqli_query($con, "Select image from images where fullName!='$user' order by fullName asc;")
or die("Error: " . mysqli_error($con));

if($check) {
    while($row = mysqli_fetch_array($check)) {
        echo "{$row['firstName']}," . "{$row['lastName']}," . "{$row['numKids']}," . "{$row['address']}," . "{$row['email']},";
        $bow = mysqli_fetch_array($query);
        echo base64_encode(file_get_contents($bow[0])) . "<br>";
    }
}

mysqli_close($con);
?>
