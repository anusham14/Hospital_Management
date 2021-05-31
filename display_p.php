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
        <style>
            #disp{
                
                background-color: white;
                color : #11C4A2;
                flex : 50%;
                width : 60.5%;
                margin-top: 5%;
                margin-left: 41%;
                padding: 10%;
                border-radius: 30px 0px 0px 0px; 
            }

            #pictxt{
                color: white;
            }

        </style>

        <title>Hospital Management System </title>
    </head>
    <body>

        <nav class="navbar navbar-light" style="background-color: white;">
                <div class="container-fluid">
                <a class="navbar-brand">APOLO HOSPITAL</a>
                <ul class="nav nav-pills">
                        <li class="active">
                            <form method="get" action="admin_panel.php">
                            <button type="submit" class="btn btn-outline-primary" id="back" name="back">Back</button>
                            </form>
                        </li>
                        <li>
                            <form method="get" action="display.php">
                            <button type="submit" class="btn btn-outline-primary" id="dbt" name="dbt">Doctors</button>
                            </form>
                        </li>
                        <li>
                            <form method="get" action="display_a.php">
                            <button type="submit" class="btn btn-outline-primary" id="abt" name="abt">Appointments </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

        <div>
            <img src="doc.png" height="550px" width="100%" style="flex:100%;">
            <div class="card-img-overlay" style="text-align:center ; margin-top:8%;" >
            <div id="pictxt" class="w3-container">
                <h1 class="w3-center w3-animate-top" style="margin-top: 1%;"> We provide the best medical service here </h1>
                <h5>There's nothing more important than our good health - that's our principal capital asset.</h5>
            </div>

            <?php

                require("dbconn.php");

                $sel = mysqli_query($connect,"SELECT id,name,phno,dob,gender FROM patients");
                echo "<table id='disp'>";
                while($res = mysqli_fetch_array($sel)){
                    echo "<tr><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]." </td><td>".$res[4]."</td> </tr>";
                }

                echo "</table>";

            ?>

            </div>
            
        </div>



    </body>
</html>