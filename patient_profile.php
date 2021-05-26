<?php
   include('patient_session.php');
?>
<html>
   
   <head>
      <title> Patient Profile </title>
   </head>
   
   <body>
      
      <?php
      echo "<h2>PATIENT PROFILE </h2>";
      $name = $patient_session;
      echo "<h3>Welcome $name </h3>" ;
      $result = mysqli_query($connect, "SELECT name,phno,gender,dob FROM patients WHERE name = '$name';");
      //echo $result;
      $row = mysqli_fetch_array($result);
      
      echo "Patient name : ".$row[0]."<br>Phone no : ".$row[1]. "<br>Gender : " .$row[2]."<br>Date of birth : ".$row[3]."<br><br>";
      
      ?>
      <a href = "patient_logout.php">Log Out</a>
   </body>
   
</html>