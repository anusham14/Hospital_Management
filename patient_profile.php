<?php
   include('patient_session.php');
   
?>
<!DOCTYPE html>
   <html lang="en">
      <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous"
         />

         <title>Hospital Management System </title>
         <style>
            .grid-container {
               background-color: #05BFAD;
               display: grid;
               grid-column-gap: 10%;
               grid-template-columns: auto auto auto;
               color: #11C4A2;
               height : 250px;
            }
            .grid-container #gc1{
            background-color: white;
            height : 75%;
            margin-top : 2%;
            margin-left : 7%;
            padding: 10%;
            font-size: 18px;
            text-align: center;
            }
            .grid-container #gc2{
            background-color: white;
            height : 75%;
            margin-top : 2%;
            margin-left : 5%;
            padding: 10%;
            font-size: 18px;
            text-align: center;
            }
            .grid-container #gc3{
            background-color: white;
            height : 75%;
            margin-top : 2%;
            margin-right : 5%;
            padding: 10%;
            font-size: 18px;
            text-align: center;
            }

            #pdetails{
               background-image : linear-gradient(180deg, rgb(22, 29, 48), rgb(24, 54, 49));
               margin-left : 5%;
               color:white;
               width : 30%;
               padding : 6%;
               border : 2px solid rgb(98, 98, 98);
               border-radius : 20px 20px 20px 20px;
            }
         </style>

         <script>
            function showMed(){

               document.getElementById("med").style.display = "block";

            }

            function showApt(){

               document.getElementById("apt").style.display = "block";

            }
         </script>     

      </head>
   <body>
    
      <nav class="navbar navbar-light" style="background-color: white;">
            <div class="container-fluid">
            <a class="navbar-brand">APOLO HOSPITAL</a>
            <ul class="nav nav-pills">
                  <li class="active">
                     <form method="get" action="patient_logout.php">
                     <button type="submit" class="btn btn-outline-primary" id="dbt" name="dbt">Logout</button>
                     </form>
                  </li>
                  
               </ul>
         </div>
      </nav> 

      <div>
         <img src="p_profile.jpg" height="550px" width="100%">
         <div class="card-img-overlay text-light" style="text-align:left ; margin-top:8%; background-image: linear-gradient(to left,rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7));width : 40%;height:43%; border-radius : 0px 400px 400px 0px;">
               
               <h2 class="card-body"> Take the <div style='color: #05BFAD;'>World's best</div> Medical service here </h2>
               There's nothing more important than our good health - that's our principal capital asset.
               
               

         </div>
         
      </div>

      <div class="grid-container">
        <div class="grid-item" id="gc1">

            <div class="regicon">
               <i class="bi bi-patch-check-fill"></i>
               <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                     <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
               </svg>
            </div>

            <h3>Click to see </h3>
            <button class="btn btn-light" onclick="showMed()">Medical History</button><br>
      

        </div>


        <div class="grid-item" id="gc2">

            <div class="regicon">
               <i class="bi bi-person-lines-fill"></i>
               <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
               </svg>
            </div>
            
            <h3>Click to see</h3>
            <button class="btn btn-light" onclick="showApt()">Appointments</button><br>
         

        </div>


        <div class="grid-item" id="gc3">
            
            <i class="bi bi-person-circle"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <h3>Patient</h3>
            <a href= "patient_logout.php">LOGOUT</a><br>
            

        </div>  
    </div>

      
   <?php

      //personal details of patient

      echo "<h2 style='margin-left: 5%;'>PATIENT PROFILE </h2>";
      $name = $patient_session;

      echo "<h3 style='margin-left: 5%;'>Welcome $name </h3>" ;
      $result = mysqli_query($connect, "SELECT id,name,phno,gender,dob FROM patients WHERE name = '$name';");
      //echo $result;
      $row = mysqli_fetch_array($result);
      
      echo "<div id = 'pdetails'><b>Patient name : </b>".$row[1]."<br><b>Phone no : </b>".$row[2]. "<br><b>Gender : </b>" .$row[3]."<br><b>Date of birth : </b>".$row[4]."</div><br><br>";

      //medical report 

      $pid = $row[0];
      $medList = mysqli_query($connect,"SELECT medreport FROM medhistory WHERE p_id = '$pid'");

      while($med = mysqli_fetch_array($medList)){

         echo "<p id = 'med' style='display : none;'><b>Medical history: </b><br>".$med[0]."</p><br>";
         
      }

      //appointment details 

      $aptList =  mysqli_query($connect,"SELECT apt_id , fees , date_of_apt,doc_id FROM appointments WHERE pid = '$pid'");

      while($ap = mysqli_fetch_array($aptList)){

         echo "<p id = 'apt' style='display : none;'><b>Appointment ID: </b>".$ap[0]."<br><b>Fees : </b>".$ap[1]."<br><b>Appointment dates: </b>".$ap[2]."<br>";
         $did = $ap[3];
         $dname = mysqli_query($connect,"SELECT name,sp FROM doctors WHERE id='$did'");
         $name =  mysqli_fetch_array($dname);
         echo "<b>Doctor : </b>".$name[0]."<b> Specialisation : </b>".$name[1]."</p><br>";

      } 
      
   ?>

   <!--form for searching doctors -->

      <form method="post" action="/DBMS lab/patient_profile.php">
            <h2>Search appointment availability : </h2><br>
            <b>Specialisation : </b>
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
         
            <input type="submit" name="searchApt" value="Search Appointment" class="btn btn-primary"><br><br>
      </form>
   
   <?php

   //searching doctors for appointment

   if($_POST['searchApt']){
      $spec = $_POST['sp'];
      //$apt_date = $_POST['aptDate'];
    
      //display name of docs sp = input sp
      $sql = "SELECT * FROM doctors WHERE sp = '$spec'";
      $doclist = mysqli_query($connect,$sql);
      
      while($docs = mysqli_fetch_array($doclist)){
         echo "<b>Doctor name : </b>".$docs['name']."<br>";
         echo "<form action='get_apt.php' method='get'><input type='date' name='selectDate' value= 'Check availability' >
         <input value=".$docs['id']." name='id' style='display:none;'><input value=".$pid." name='pid' style='display:none;'><input value=".$docs['name']." name='name' style='display:none;'><input type = 'submit' name='book' value='Check Appointments' id='check' class='btn btn-primary'> </form>";
      }
   }  
   ?>

   </body>
   
</html>