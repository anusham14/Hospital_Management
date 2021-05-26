<html>
    <head>
       <h2>PATIENT FORM SUBMISSION </h2> 
    </head>
        <body>
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <table>
                <tr>
                    <td>Name* : </td>
                    <td><input type="text" name="name" required>
                    <!--<span class="error"><?php echo $nameErr; ?> </span>-->
                    </td><br><br>
                    
                </tr>
                <tr>
                    <td>Phone number : </td>
                    <td><input type="tel" name="phno" pattern="[0-9]{5}[0-9]{5}" placeholder="1234567890"></td><br><br>
                </tr>
                <tr>
                    <td>Create password* : </td>
                    <td><input type="password" name="pass" required>
                    <!--<span class="error"><?php echo $passErr; ?> </span>-->
                </td><br><br>
                    
                </tr>
                <tr>
                <td>Gender : </td>
                <td><input type="radio" name="Gender" value="female"> female </td>
                <td><input type="radio" name="Gender" value="male"> male </td>
                <td><input type="radio" name="Gender" value="not"> Not choose to disclose</td><br><br>
                <tr>
                    <td>
                        Date of birth :
                    </td>
                    <td>
                        <input type="date" name="dob"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td> <input type="text" name="address"> </td><br><br>
                </tr>
                </table>
            
                <input type="submit" name="Submit" value="Submit">
            
            </form>

            <?php
            //if name or password missing form can't be submitted
            /*if($nameErr || $passErr){
                echo "<h3>You have empty fields.<h3>";
                echo "<h2> Form submission unsuccessful!! <h2><br>";
            }*/
                
            /*//displaying all the data
                echo "<h3>Form Submission successfull. <h3>";
                echo "<h4>Your data is : </h4>";
                echo "$name <br>";
                echo "$phno <br>";
                echo "$pass <br>";
                echo "$gender <br>";
                echo "$dob <br>";
                echo "$address<br><br>";*/

                //function to check if connection successful
                require("dbconn.php");

                //query to insert data into table
                $write = mysqli_query($connect,"INSERT INTO patients VALUES('','$name','$phno','$pass','$gender','$dob','$address')");

                //query to display last entry entered
                $display = mysqli_query($connect,"SELECT * FROM patients ORDER BY id DESC LIMIT 1");
                while($row = mysqli_fetch_assoc($display)){
                    $id = $row["id"];
                    $name = $row["name"];
                    echo "Patient no. $id , $name is successfully registered!!";
                }

                //query to calculate age.
                //$age = (date('Y') - date('Y',strtotime($row["dob"])));
            
            
            ?>
        </body>

</html>