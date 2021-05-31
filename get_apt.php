<html>
    <body>
        <?php
            
            require("dbconn.php");
            
            $docid = $_GET["id"];
            $aptDate = $_GET["selectDate"];

            //echo '<h2>Hey '.$row['name'].' ! Book your appointments</h2>';

            $newDate = date("Y-m-d", strtotime($aptDate));
            $aptList = mysqli_query($connect,"SELECT * FROM appointments as ap WHERE ap.doc_id = '$docid' and ap.date_of_apt - '$newDate' = 0");

            $count = mysqli_num_rows($aptList);
            $docsList = mysqli_fetch_array($aptList);

            if($count >= 5){
                echo 'Bookings not available ';
            }
            else{
                echo 'Bookings available<br>';
                $display = mysqli_query($connect,"SELECT fees, id, name,sp ,phno ,doc_id FROM doctors INNER JOIN appointments ON appointments.doc_id = doctors.id"); 
                
                $results = mysqli_fetch_array($display);

                echo "<b>Doctor Name : </b>".$results['name']."<b> Doctor ID : </b>".$results['id']."<b> Specialisation : </b>".$results['sp']."<b> Phone no. : </b>".$results['phno']."<b> Fees : </b>".$results['fees']."<b> Appointment date : </b>".$newDate."<br>";

                echo "<form action=' ' method='post'>
                <input type = 'submit' name='book' value='Book Appointment' id='book'> </form>";

                if($_POST['book']){
                    $did = $results['id'];
                    $fees = $results['fees'];
                    $insert = mysqli_query($connect,"INSERT INTO appointments VALUES('','$did','$fees',4,'$newDate')");
                }
            }
                    
        ?>
    </body>
</html>