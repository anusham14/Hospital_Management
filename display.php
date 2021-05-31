<?php

require("dbconn.php");
echo "<br><table><thead>ID &emsp;&emsp;</thead><thead>Name &emsp;&emsp;&emsp;&emsp;&emsp;</thead><thead>Specialisation &emsp;</thead><thead>Ph No. &emsp;&emsp;&emsp;</thead><thead>Email &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</thead><thead>DOB </thead>";

$sel = mysqli_query($connect,"SELECT id,name,sp,phno,email,gender FROM doctors");
while($res = mysqli_fetch_array($sel)){
    echo "<tr><td>".$res[0]."</td><td>&emsp;".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td><td>&emsp;".$res[4]."</td><td>&emsp;".$res[5]."</td> </tr>";
}
    
echo "</table>";

?>