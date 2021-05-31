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
            
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7));;
            color : white;
            flex : 50%;
            width : 50%;
            margin-top: 5%;
            margin-left: 50%;
            padding: 10%;
            border-radius: 30px 0px 30px 0px; 
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
                            <button type="submit" class="btn btn-outline-primary" id="pbt" name="pbt">Doctors</button>
                            </form>
                        </li>
                        <li>
                            <form method="get" action="display_p.php">
                            <button type="submit" class="btn btn-outline-primary" id="abt" name="abt">Patients </button>
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
                    echo "<table id='disp'>";
                    $sel = mysqli_query($connect,"SELECT apt_id,doc_id,fees,pid,date_of_apt FROM appointments");
                    while($res = mysqli_fetch_array($sel)){
                        echo "<tr><td> ".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td><td>".$res[4]."</td></tr>";
                    }
                    echo "</table>";
                ?>

            </div>
                
        </div>
                
    </body>
</html>