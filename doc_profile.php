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
            width : 80%;
            height : 93%;
            margin-top : 2%;
            margin-left : 3%;
            padding: 10%;
            font-size: 18px;
            text-align: center;
            border-radius : 10px 10px 0px 0px;
            }

            .plist{
               text-align : center;
               color : white;
               width : 30%;
               margin : 2%;
               background-image : linear-gradient(180deg,#05BFAD,#11C4A2);
               padding:2%;
               border-radius : 10px;
            }
            
      </style>
      <title> Doctor Profile </title>

      <script>
         function showApt(){

            document.getElementById("apt").style.display = "block";

      }
      </script>

   </head>
   
   <body>

      <nav class="navbar navbar-dark" style="background-color: white;">
         <div class="container-fluid">
               <a class="navbar-brand">APOLO HOSPITAL</a>
               <a href = "doc_logout.php">Log Out</a>
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
            <button class="btn btn-light" onclick="showApt()">Appointments </button><br>
      

        </div>  
    </div>

         
      <?php

         //show doctor details
         echo "<h2>DOCTOR PROFILE </h2>";

         $name = $doc_session;
         echo "<h3>Welcome $name</h3>";

         //fetch doctor details 
         $result = mysqli_query($connect, "SELECT name,sp,phno,email,dob,gender,id FROM doctors WHERE name = '$name';");
         //echo $result;
         $row = mysqli_fetch_array($result);
         
         echo "<b>Doctor name : </b>".$row[0]."<br><b>Specialisation : </b>".$row[1]. "<br><b>Phone no. : </b>" .$row[2]."<br><b>Email  </b>".$row[3]."<br><b>Date of birth : </b>".$row[4]."<br><b>Gender : </b>".$row[5]."<br><br>";
         $_SESSION["docid"]= $row[6];

         $did = $row[6];

         //check upcoming appointments 
         $aptList = mysqli_query($connect, "SELECT pid,date_of_apt FROM appointments WHERE doc_id = '$did' AND date_of_apt>= CURDATE()");
         while($apt = mysqli_fetch_array($aptList)){

            echo "<p id = 'apt' style='display : none;'><b>Patient ID: </b>".$apt[0]."<b> Date of appointment : </b>".$apt[1]."</p><br>";
            
         }

      ?>

   <!--FORM TO SEARCH PATIENT USING NAME OR PHONE NO. -->
      <form method="post" action="/DBMS lab/doc_profile.php" style = "margin-left:2%;">
         <b>Search Patient : </b><br>
         <input type="text" name="searchvalue" placeholder="Search by name or Phone number" style="outline: none;height:38px;background:rgba(165, 165, 165, 0.507);border-radius:5px;">
         <input type="submit" class="btn btn-outline-success" name="Search" value="Search Patient"><br><br>
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
   
                  echo "<form action='add_report.php' method='get' class='plist'> <b>Name of patient :  </b>".$row['name']."<br><b>Phone no: </b>".$row['phno']."<br><b>Gender: </b>".$row['gender']."<br><b>Age : </b>".$age."<br><br>
                  <input value=".$row['id']." name='id' style='display:none;'>
                  <input value=".$row['name']." name='name' style='display:none;'>
                  <input type='submit' name='Add' value='Add Report' class='btn btn-primary'><br><br></form>";
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
   
      
   </body>
   
</html>