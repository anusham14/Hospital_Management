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
      
      /*echo "<form action='get_apt.php' method='get'>
      <b>Name of patient :  </b>".$row['name'].
      "<br><b>Phone no: </b>".$row['phno'].
      "<br><b>Gender: </b>".$row['gender'].
      "<br><b>Date of birth : </b>".$row['dob']."<br><br>
      <input value=".$row['id']." name='id' style='display:none;'>
      <input value=".$row['name']." name='name' style='display:none;'>
      <input type='submit' name='Get' value='Get Appointment'><br><br></form>";*/

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
      $result = mysqli_query($connect,$sql);
      
      while($rows = mysqli_fetch_array($result)){
         echo "Doctor name : ".$rows['name']."<br>";
         echo "<form action='' method='get'><input type='date' name='selectDate' value= 'Check availability'></form>"
      }

      //$sql = "SELECT apt_id,doc_id,doc_sp,doc_name,fees,pname,COUNT(date_of_apt) as apt_nos FROM appointments WHERE 
      /*$sql = "SELECT doc_id,doc_name,doc_sp,fees,COUNT(date_of_apt) as apt_nos FROM appointments apt INNER JOIN doctors doc ON apt.doc_id = doc.id WHERE date_of_apt = '$apt_date'";
      $result = mysqli_query($connect,$sql);
      $rows = mysqli_fetch_array($result);
      
      $availability = 5-$rows[4];
      if($availability>0){
          //echo "Doctor ID : ".$rows[0]."<br>Doctor name : ".$rows[1]."<br>Fees : ".$rows[2]."<br>Avaibilities : ".$availability."<br>";
          echo "<form action='book_apt.php' method='get'> <b>Doctor ID : </b>".$rows[0]."<br><b>Doctor name : </b>".$rows[1]."<br><b>Fees : </b>".$rows[3]."<br><b>Avaibilities : </b>".$availability."<br><br>
          <input type='submit' name='Book' value='Book Appointment'><br><br></form>";*/
      }
      else{
          echo "Sorry no available appointments for the date you're looking for select some different date!";
      }
      
   ?>

      <a href = "patient_logout.php">Log Out</a>
   </body>
   
</html>