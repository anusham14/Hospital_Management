<?php
   include('patient_search_session.php');
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

        #select{
            width : 30%;
            color : white;
            padding : 3%;
            height : 70%;
            margin : 10%;
            background-image : linear-gradient(180deg, rgb(22, 29, 48), rgb(24, 54, 49));
            border-radius : 10px;
        
        }

        .txt-field{
            background :rgba(74, 77, 76, 0.616);
            margin-top : 5px;
            border-radius : 5px;
           
        }

        #foot{
               color : white;
               width : 100%;
               background-image : linear-gradient(180deg,#05BFAD,#11C4A2);
               padding:2%;       
        }
    </style>

    </head>
    <body>

        <nav class="navbar navbar-light" style="background-color: white;">
            <div class="container-fluid">
            <a class="navbar-brand">APOLO HOSPITAL</a>
            <ul class="nav nav-pills">
                    <li class="active">
                        <form method="get" action="doc_profile.php">
                        <button type="submit" class="btn btn-outline-primary" id="dbt" name="dbt">Back</button>
                        </form>
                    </li>
                    
                </ul>
            </div>
        </nav> 

        <?php
        //echo $searchp_session;
        $patient_name = $_GET["name"];
        $patient_id = $_GET["id"];
        echo '<b>Name of patient :  </b>'.$patient_name.'<br><b>Patient id : </b>'.$patient_id;
        ?>
        <img src="form.png" height= "100%" width="100%">
        <div class="card-img-overlay text-light" id="login">
        <br><br>
        <form method="post" action=" " id="select">
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
                    <td><input type="submit" name="Save" value="Save Report" class="btn btn-primary"></td>  
                </tr>  
            </table>  
        </form>
        </div>
        
    </body>
</html>
<?php
//require("dbconn.php");
//echo $doc_id."<br>" ;

 
echo "<div id='foot'>";
echo "<b>Previous reports is as follows : </b><br>";
$in =  mysqli_query($connect,"SELECT medreport FROM medhistory WHERE p_id = '$patient_id';");
    while($r = mysqli_fetch_array($in)){
        echo "Medical history of the patient is : ".$r[0]."<br>";
}
echo "</div>";

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



      
