<?php
require("dbconn.php");
$extract = mysqli_query($connect,"SELECT * FROM patients");
while($row = mysqli_fetch_assoc($extract)){
    $id = $row['id'];
    $name = $row["name"];
    //$phno = $row["phno"];
    $age = (date('Y') - date('Y',strtotime($row["dob"])));
    echo "Patient Name : $name , ID = $id of age = $age is successfully registered!<br>";
}
?>