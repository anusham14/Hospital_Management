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

            #login{
                color: white;
                width : 30%;
                height : 70%;
                margin : 10%;
                padding : 3%;
                background-image : linear-gradient(180deg, rgb(22, 29, 48), rgb(24, 54, 49));
                border-radius : 10px;
            
            }

            .txt-field{
                background :rgba(74, 77, 76, 0.616);
                margin-top : 5px;
                border-radius : 5px;
            
            }
        </style>

    </head>

    <body>

        <nav class="navbar navbar-light" style="background-color: white;">
                <div class="container-fluid">
                <a class="navbar-brand">APOLO HOSPITAL</a>
                <ul class="nav nav-pills">
                    <li class="active">
                        <form method="get" action="patient_profile.php">
                        <button type="submit" class="btn btn-outline-primary" id="dbt" name="dbt">Back</button>
                        </form>
                    </li>
                    
                </ul>
            </div>
        </nav> 

        <?php
            
            require("dbconn.php");
            
            $docid = $_GET["id"];
            $aptDate = $_GET["selectDate"];
            $pid = $_GET["pid"];

            //check if appointment is available or not 

            $newDate = date("Y-m-d", strtotime($aptDate));
            $aptList = mysqli_query($connect,"SELECT * FROM appointments as ap WHERE ap.doc_id = '$docid' and ap.date_of_apt - '$newDate' = 0");

            $count = mysqli_num_rows($aptList);
            $docsList = mysqli_fetch_array($aptList);

            echo '<img src="form.png" height= "100%" width="100%">';

            //if for a doctor no. of appointments is greater than 5 for a day then no bookings will be available
            
            if($count >= 5){
                echo '<div class="card-img-overlay text-dark">
                <br><br>';

                //if not print this msg 

                echo 'Bookings not available ';
            }
            else{
                
                //if available then print doctor(get from doctor table) & appointment details & confirm booking 

                echo '<div class="card-img-overlay text-light" id="login">
                <br><br>';
                echo '<b>Bookings available!!</b><br>';
                $display = mysqli_query($connect,"SELECT fees, id, name,sp ,phno FROM doctors WHERE id = '$docid'"); 
                
                $results = mysqli_fetch_array($display);

                echo "<b>Doctor Name : </b>".$results['name']."<br><b> Doctor ID : </b>".$docid."<br><b> Specialisation : </b>".$results['sp']."<br><b> Phone no. : </b>".$results['phno']."<br><b> Fees : </b>".$results['fees']."<br><b> Appointment date : </b>".$newDate."<br>";

                echo "<form action=' ' method='post'>
                <input type = 'submit' name='book' value='Book Appointment' id='book' class='btn btn-primary'> </form>";
                echo "</div>";

                
                // if booking is successfull then print the msg & insert appointment details in the appointment table.
                if($_POST['book']){
                    $did = $results['id'];
                    $fees = $results['fees'];
                    $insert = mysqli_query($connect,"INSERT INTO appointments VALUES('','$did','$fees',$pid,'$newDate')");
                    echo "<script>alert('Booking successfull!')</script>";
                }
            }
                    
        ?>
    </body>
</html>