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
            #ext_reg{
                
            }
            #doc_reg{
                
                background-color: rgba(0, 0, 0, 0.4);
                border-radius : 20px;
                width: 40%;
                margin-left:30%;
                color : white;
            }
        </style>
       
    </head>
        <body>

            <nav class="navbar navbar-light" style="background-color: white;">
                <div class="container-fluid">
                    <a class="navbar-brand">APOLO HOSPITAL</a>
                    <form method="get" action="admin_panel.php">
                        <button type="submit" class="btn btn-outline-primary" name="back">Back</button>
                    </form>
                </div>
            </nav>

            <?php
            //set all the values to null 
            $name = $phno = $pass = $gender = $address = '';
            $nameErr = $passErr = '';
            $dob;
            
            //for taking inputs
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                /*if(empty($_POST["name"])){
                    $nameErr = "Name can't be empty.";
                }
                else{
                    $name = test_input($_POST["name"]);
                }*/
                $name = test_input($_POST["name"]);
                $phno = test_input($_POST["phno"]);

                /*if(empty($_POST["pass"])){
                    $passErr = "Enter password!!"; 
                }
                else{
                    $pass = test_input($_POST["pass"]);
                }*/
                $pass = test_input($_POST["pass"]);
                $gender = test_input($_POST["Gender"]);
                $dob = test_input($_POST["dob"]);
                $address = test_input($_POST["address"]);
                
            }

            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
 
            <!--<p><span class="error" color="red">*required</span></p>-->
            <div>
            <img src="doc_reg.jpg" height= "800px" width="100%"> 
            <div class="card-img-overlay text-light" style="text-align:center;" id="ext_reg">
                <h2 class="card-body" style="margin-top:2%;">PATIENT FORM SUBMISSION </h2> 
        
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="doc_reg">
                    <table >
                    <tr>
                        <td style="color:white;">Name* : </td>
                        <td><input type="text" name="name" required>
                        <!--<span class="error"><?php echo $nameErr; ?> </span>-->
                        </td><br><br>
                        
                    </tr>
                    <tr>
                        <td style="color:white;">Phone number : </td>
                        <td><input type="tel" name="phno" pattern="[0-9]{5}[0-9]{5}" placeholder="1234567890"></td><br><br>
                    </tr>
                    <tr>
                        <td style="color:white;">Create password* : </td>
                        <td><input type="password" name="pass" required>
                        <!--<span class="error"><?php echo $passErr; ?> </span>-->
                    </td><br><br>
                        
                    </tr>
                    <tr>
                    <td style="color:white;">Gender : </td>
                    <td style="color:white;"><input type="radio" name="Gender" value="female"> female </td>
                    <td style="color:white;"><input type="radio" name="Gender" value="male"> male </td>
                    <td style="color:white;"><input type="radio" name="Gender" value="not"> Not choose to disclose</td><br><br>
                    <tr>
                        <td style="color:white;">
                            Date of birth :
                        </td>
                        <td style="color:white;">
                            <input type="date" name="dob"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="color:white;">Address : </td>
                        <td> <input type="text" name="address"> </td><br><br>
                    </tr>
                    </table>
                
                    <input type="submit" name="Submit" value="Submit" class="btn btn-outline-primary">
                
                </form>
                </div>
        </div>

            <?php
            
                //function to check if connection successful
                require("dbconn.php");

                //query to insert data into table
                if($_POST["Submit"]){
                $write = mysqli_query($connect,"INSERT INTO patients VALUES('','$name','$phno','$pass','$gender','$dob','$address')");
                }

                //query to display last entry entered
                $display = mysqli_query($connect,"SELECT * FROM patients ORDER BY id DESC LIMIT 1");
                while($row = mysqli_fetch_assoc($display)){
                    $id = $row["id"];
                    $name = $row["name"];
                    echo "<script>Patient no. $id , $name is successfully registered!!</script>";
                }

                //query to calculate age.
                //$age = (date('Y') - date('Y',strtotime($row["dob"])));
            
            
            ?>
        </body>

</html>