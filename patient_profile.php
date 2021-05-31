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
      $result = mysqli_query($connect, "SELECT id,name,phno,gender,dob FROM patients WHERE name = '$name';");
      //echo $result;
      $row = mysqli_fetch_array($result);
      
      echo "Patient name : ".$row[0]."<br>Phone no : ".$row[1]. "<br>Gender : " .$row[2]."<br>Date of birth : ".$row[3]."<br><br>";
      
   ?>
      <form method="post" action="/DBMS lab/patient_profile.php">
            <h2>Search appointment availability : </h2><br>
            Specialisation : 
            <input list="sp" name="sp"> 
               <datalist id="sp">
                  <option value="Gynaecologist"></option>
                  <option value="Orthopedic"></option>
                  <option value="Cardiologist"></option>
                  <option value="Darmetologist"></option>
                  <option value="ENT specialist"></option>
                  <option value="Pulmonologist"></option>
                  <option value="Child Specialist"></option>
                  <option value="Radiologist"></option>
                  <option value="General Physicist"></option>
                  <option value="Dentist"></option>
                  <option value="Neurologist"></option>
               </datalist>
         
            <input type="submit" name="searchApt" value="Search Appointment"><br><br>
      </form>
   
   <?php

   if($_POST['searchApt']){
      $spec = $_POST['sp'];
      //$apt_date = $_POST['aptDate'];
    
      $sql = "SELECT * FROM doctors WHERE sp = '$spec'";
      $doclist = mysqli_query($connect,$sql);
      
      while($docs = mysqli_fetch_array($doclist)){
         echo "Doctor name : ".$docs['name']."<br>";
         echo "<form action='get_apt.php' method='get'><input type='date' name='selectDate' value= 'Check availability'>
         <input value=".$docs['id']." name='id' style='display:none;'><input value=".$docs['name']." name='name' style='display:none;'><input type = 'submit' name='book' value='Check Appointments' id='check'> </form>";
      }
   }

   function checkApts($docid, $aptDate){

      //find diff using func

      $newDate = date("Y-m-d", strtotime($aptDate));
      $aptList = mysqli_query($connect,"SELECT * FROM appointments as ap WHERE ap.doc_id = '$docid'  and ap.date_of_apt - '$newDate' = 0");

      $count = mysqli_num_rows($aptList);

      if($count >= 5){
         echo '<script>document.getElementById("book").disabled = true;</script>';
      }
      else{
         echo '<script>document.getElementById("book").disabled = false;</script>';
      }
   }
      
   ?>

      <a href = "patient_logout.php">Log Out</a>
   </body>
   
</html>