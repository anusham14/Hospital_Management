<html>
    <body>
        <?php
            
            require("dbconn.php");
            $patient_name = $_GET["name"];
            $patient_id = $_GET["id"];
            echo '<h2>Hey '.$patient_name.' ! Check your appointments here</h2>';

        ?>

        <form method="post" action=" ">
            <h3> SELECT DATE & TYPE OF DOCTOR </h3>
                <table>
                    <tr>
                        <td>Specialisation : </td>
                        <td>
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
                    
                        </td>
                        <br><br>
                    </tr>
                    <tr>
                        <td> Date : </td>
                        <td>
                            <input type="date" name="aptDate">
                        </td>
                    </tr>
            </table>
            <br>
            <input type = "submit" name="searchApt" value="Search Appointment">
        </form>
        <?php
        
        if($_POST['searchApt']){
        $spec = $_POST['sp'];
        $apt_date = $_POST['aptDate'];
        //$sql = "SELECT apt_id,doc_id,doc_sp,doc_name,fees,pname,COUNT(date_of_apt) as apt_nos FROM appointments WHERE 
        $sql = "SELECT doc_id,doc_name,doc_sp,fees,COUNT(date_of_apt) as apt_nos FROM appointments apt INNER JOIN doctors doc ON apt.doc_id = doc.id";
        $result = mysqli_query($connect,$sql);
        $rows = mysqli_fetch_array($result);
        
        $availability = 5-$rows[4];
        if($availability>0){
            //echo "Doctor ID : ".$rows[0]."<br>Doctor name : ".$rows[1]."<br>Fees : ".$rows[2]."<br>Avaibilities : ".$availability."<br>";
            echo "<form action='book_apt.php' method='get'> <b>Doctor ID : </b>".$rows[0]."<br><b>Doctor name : </b>".$row[1]."<br><b>Fees : </b>".$row[2]."<br><b>Avaibilities : </b>".$availability."<br><br>
            <input type='submit' name='Book' value='Book Appointment'><br><br></form>";
        }
        else{
            echo "Sorry no available appointments for the date you're looking for select some different date!";
        }
        }
        
        ?>
    </body>
</html>