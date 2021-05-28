<?php
   include('patient_search_session.php');
?>
<html>
    <body>
        <?php
        //echo $searchp_session;
        $patient_name = $_GET["name"];
        $patient_id = $_GET["id"];
        echo '<b>Name of patient :  </b>'.$patient_name.'<br><b>Patient id : </b>'.$patient_id;
        ?>
        <form method="post" action=" ">
            <table>  
                <tr>  
                    <td><b>Select health conditions : </b></td>  
                </tr>  
                <tr>  
                    <td>High Sugar </td>  
                    <td><input type="checkbox" name="hc[]" value="hsugar"></td>  
                </tr>  
                <tr>  
                    <td> High Blood Pressure</td>  
                    <td><input type="checkbox" name="hc[]" value="hbp"></td>  
                </tr>  
                <tr>  
                    <td>Lipid profile </td>  
                    <td><input type="checkbox" name="hc[]" value="lipid"></td>  
                </tr>  
                <tr>  
                    <td>Liver functioning  improperly </td>  
                    <td><input type="checkbox" name="hc[]" value="liver"></td>  
                </tr> 
                <tr>  
                    <td> Heart problems </td>  
                    <td><input type="checkbox" name="hc[]" value="heart"></td>  
                </tr>  
                <tr>  
                    <td> High uric acid </td>  
                    <td><input type="checkbox" name="hc[]" value="uric"></td>  
                </tr>
                <tr>  
                    <td> Others </td>  
                    <td><input type="text" name="hc[]"></td>  
                </tr>  
                    
                <tr>  
                    <td><input type="submit" name="Save" value="Save Report"></td>  
                </tr>  
            </table>  
        </form>
    </body>
</html>
<?php
//require("dbconn.php");
//echo $doc_id."<br>" ;

//select id & name of the patient u searched 
$res = mysqli_query($connect,"SELECT * FROM patients WHERE id='$patient_id';");
$row = mysqli_fetch_array($res);
$pid = $row["id"];
$pname = $row["name"];

//if save button triggered
if(isset($_POST['Save']))  
{  
$checkbox =$_POST['hc'];
//echo $checkbox;  
$report="";  

//append the value of checkboxes selected 
foreach($checkbox as $items)  
   {  
      //echo $items."<br>"; 
      $report .= $items;
      $report .= ",";
       
   }  
//echo $report;
//insert into medhistory 
$insert = mysqli_query($connect,"INSERT INTO medhistory VALUES ('','$doc_id','$pid','$pname','$report')");  
if($insert == 1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>'; 
      
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
} 
?>


      
