<?php
   include('patient_search_session.php');
?>
<html>
    <body>
        <?php
        echo '<b>Name of patient :  </b>'.$searchp_session."<br>";
        ?>
        <form method="post" action=" ">
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
                <!--<tr>  
                    <td> Others </td>  
                    <td><input type="text" name="hc"></td>  
                </tr>-->   
                    
                <tr>  
                    <td><input type="submit" name="Save" value="Save Report"></td>  
                </tr>  
            </table>  
        </form>
    </body>
</html>
<?php
//require("dbconn.php");
echo $doc_id ;

//select id & name of the patient u searched 
$res = mysqli_query($connect,"SELECT * FROM patients WHERE name='$searchp_session';");
$row = mysqli_fetch_array($res);
$pid = $row["id"];
$pname = $row["name"];

//if save button triggered
if(isset($_POST['Save']))  
{  
$checkbox1=$_POST['hc'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$insert_chk=mysqli_query($connect,"INSERT INTO medhistory VALUES ('','$doc_id','$pid','$pname','$chk')");  
if($insert_chk==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
} 
?>


      
