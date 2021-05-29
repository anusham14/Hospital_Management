<?php
   include('doc_session.php');
?>
<html>
   
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
      <title> Doctor Profile </title>
   </head>
   
   <body>

      <nav class="navbar navbar-dark" style="background-color: white;">
         <div class="container-fluid">
               <a class="navbar-brand">APOLO HOSPITAL</a>
               <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
               </form>
         </div>
      </nav>
         
      <?php

      //show doctor details
      echo "<h2>DOCTOR PROFILE </h2>";

      $name = $doc_session;
      echo "<h3>Welcome $name</h3>";

      //fetch doctor details 
      $result = mysqli_query($connect, "SELECT name,sp,phno,email,dob,gender,id FROM doctors WHERE name = '$name';");
      //echo $result;
      $row = mysqli_fetch_array($result);
      
      echo "<b>Doctor name : </b>".$row[0]."<br><b>Specialisation : </b>".$row[1]. "<br><b>Phone no. : </b>" .$row[2]."<br><b>Email : </b>".$row[3]."<br><b>Date of birth : </b>".$row[4]."<br><b>Gender : </b>".$row[5]."<br><br>";
      $_SESSION["docid"]= $row[6];
      ?>

   <!--FORM TO SEARCH PATIENT USING NAME OR PHONE NO. -->
      <form method="post" action="/DBMS lab/doc_profile.php">
         Search Patient : <br>
         <input type="text" name="searchvalue" placeholder="Search by name or Phone number">
         <input type="submit" name="Search" value="Search Patient"><br><br>
      </form>

      <?php
      
         //function to search values
         function search($sv){

            require("dbconn.php");

            //value will get searched even with similarities
            $sql="SELECT * from patients WHERE name like '%$sv%' OR phno = '$sv'";
            $result =mysqli_query($connect,$sql);

            while($row=$result->fetch_assoc()){
               
              if($row > 0){
  
                 $age = age($row['dob']);
  
                 echo "<form action='add_report.php' method='get'> <b>Name of patient :  </b>".$row['name']."<br><b>Phone no: </b>".$row['phno']."<br><b>Gender: </b>".$row['gender']."<br><b>Age : </b>".$age."<br><br>
                 <input value=".$row['id']." name='id' style='display:none;'>
                 <input value=".$row['name']." name='name' style='display:none;'>
                 <input type='submit' name='Add' value='Add Report'><br><br></form>";
               }
            }
         }

         //get the age
         function age($dob){
            $diff = (date('Y')-date('Y',strtotime($dob)));
            return $diff;
         }
         if($_POST["Search"]){
            $search_value = $_POST["searchvalue"];
            search($search_value);
         }
         
      ?>
   
      <a href = "doc_logout.php">Log Out</a>
   </body>
   
</html>