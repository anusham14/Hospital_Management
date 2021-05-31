<?php

require("dbconn.php");

$sel = mysqli_query($connect,"SELECT id,name,phno,dob,gender FROM patients");
while($res = mysqli_fetch_array($sel)){
    echo " ".$res[0]." ".$res[1]." ".$res[2]." ".$res[3]." ".$res[4]."<br>";
}

?>