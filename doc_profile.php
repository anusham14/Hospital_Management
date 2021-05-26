<?php
   include('doc_session.php');
?>
<html>
   
   <head>
      <title> Doctor Profile </title>
   </head>
   
   <body>
       
      <?php

      //show doctor details
      echo "<h2>DOCTOR PROFILE </h2>";

      $name = $doc_session;
      echo "<h3>Welcome $name</h3>";

      //fetch doctor details 
      $result = mysqli_query($connect, "SELECT name,sp,phno,email,dob,gender FROM doctors WHERE name = '$name';");
      //echo $result;
      $row = mysqli_fetch_array($result);
      
      echo "<b>Doctor name : </b>".$row[0]."<br><b>Specialisation : </b>".$row[1]. "<br><b>Phone no. : </b>" .$row[2]."<br><b>Email : </b>".$row[3]."<br><b>Date of birth : </b>".$row[4]."<br><b>Gender : </b>".$row[5]."<br><br>";

      ?>

   <!--FORM TO SEARCH PATIENT USING NAME OR PHONE NO. -->
      <form method="post" action=" ">
         Search Patient : <br>
         <input type="text" name="searchvalue" placeholder="Search by name or Phone number">
         <input type="submit" name="Search" value="Search Patient"><br><br>
      </form>

      <?php
      //php code to search the value 

      //if search button pressed
        if($_POST["Search"]){

         $search_value = $_POST["searchvalue"];

         //value will get searched even with similarities
         $sql="SELECT * from patients WHERE name like '%$search_value%' OR phno like '%$search_value%'";
         $result =mysqli_query($connect,$sql);

         while($row=$result->fetch_assoc()){
            
            //get the age 
            $dob = $row["dob"];
            $diff = (date('Y')-date('Y',strtotime($dob)));

            echo '<b>Name of patient :  </b>'.$row["name"]."<br><b>Phone no: </b>".$row["phno"]."<br><b>Gender: </b>".$row["gender"]."<br><b>Age : </b>".$diff."<br><br>";

            //echo "<input type='submit' name='Add Report' value='Add Report'><br><br>";
            /*if($_POST("Add")){
               echo " ";
            }*/
         } 
      }      
      ?>

      <form method="post">
            <input type='submit' name='Add' value='Add Report'><br><br>
                <table>  
                    <tr>  
                       <td><b>Select health conditions : </b></td>  
                    </tr>  
                    <tr>  
                       <td>High Sugar </td>  
                       <td><input type="checkbox" name="hc" value="hsugar"></td>  
                    </tr>  
                    <tr>  
                       <td> High Blood Pressure</td>  
                       <td><input type="checkbox" name="hc" value="hbp"></td>  
                    </tr>  
                    <tr>  
                       <td>Lipid profile </td>  
                       <td><input type="checkbox" name="hc" value="lipid"></td>  
                    </tr>  
                    <tr>  
                       <td>Liver functioning  improperly </td>  
                       <td><input type="checkbox" name="hc" value="liver"></td>  
                    </tr> 
                    <tr>  
                        <td> Heart problems </td>  
                        <td><input type="checkbox" name="hc" value="heart"></td>  
                     </tr>  
                     <tr>  
                        <td> High uric acid </td>  
                        <td><input type="checkbox" name="hc" value="uric"></td>  
                     </tr>
                     <tr>  
                        <td> Others </td>  
                        <td><input type="text" name="hc"></td>  
                     </tr>   
                       
                    <tr>  
                       <td><input type="submit" name="Add Report" value="Save Report"></td>  
                    </tr>  
                 </table>  
      </form>

      <br><br>
      <a href = "doc_logout.php">Log Out</a>
   </body>
   
</html>