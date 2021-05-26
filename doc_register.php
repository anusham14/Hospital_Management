<html>
        <body>
        <?php
            
            $name = $sp = $phno = $email = $pass = $rpass = $gender = '';
            $dob = $doj = '';

            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                //taking inputs 
                $name = test_input($_POST["name"]);
                $sp = test_input($_POST["sp"]);
                $phno = test_input($_POST["phno"]);
                $email = test_input($_POST["email"]);
                $pass = test_input($_POST["pass"]);
                $rpass = test_input($_POST["rpass"]);
                $dob = test_input($_POST["dob"]);
                $doj = test_input($_POST["doj"]);
                $gender = test_input($_POST["Gender"]);
                
            }

            function checkEmail($email){
                //$email = test_input($_POST["email"]);
                //validate format
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    echo "Invalid email format!";
                    return false;
                }
                //check if email exists
                $result = mysqli_query($connect,"SELECT * FROM doctors WHERE email='$email'");
                if(mysqli_num_rows($result)>1){
                    echo "Email already exists!";
                    return false;
                }
                return true;

            }

            function validPass($pass,$rpass){
                if($pass != $rpass){
                    echo "Wrong! Re-type password!";
                    return false;
                }

                return true;
            }

            ?>

            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>DOCTOR REGISTRATION</h2>
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name" required></td><br><br>
                </tr>
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
                    <td>Phone number :  </td>
                    <td><input type="tel" name="phno" pattern=[0-9]{10}></td><br><br>
                </tr>
                <tr>
                    <td>Email :  </td>
                    <td><input type="email" name="email"></td><br><br>
                </tr>
                <tr>
                    <td>Password :  </td>
                    <td><input type="password" name="pass" required></td><br><br>
                </tr>
                <tr>
                    <td>Re-Enter Password :  </td>
                    <td><input type="password" name="rpass" required></td><br><br>
                </tr>
                
                <tr>
                    <td>Date of birth :  </td>
                    <td><input type="date" name="dob"></td><br><br>
                </tr>
                <tr>
                    <td>Date of joining :  </td>
                    <td><input type="date" name="doj" required></td><br><br>
                </tr>
                
                

                <tr>
                <td>Gender : </td>
                </tr>
                <td><input type="radio" name="Gender" value="female"> female </td>
                <td><input type="radio" name="Gender" value="male"> male </td>
                <td><input type="radio" name="Gender" value="not"> Not choose to disclose </td><br><br>
                </table>

                <input type="submit" name="Submit" value="Submit">
            </form>
            <?php
                require("dbconn.php");
                if(validPass($pass,$rpass)&& checkEmail($email)){
                    $write = mysqli_query($connect,"INSERT INTO doctors VALUES('','$name','$sp','$phno','$email','$pass','$rpass','$dob','$doj','$gender')");
                    echo "Doctor successfully registered!";
                }
                else{
                    echo "Registration failed";
                }
            /*if(isset($_POST["Submit"])){
                $encpass = md5($pass);
                
                echo "<h2> Form submission successful!! <h2>";
                    echo "<h4>Your data is : </h4>";
                    echo "$name <br>";
                    echo "$phno <br>";
                    echo "$pass <br>";
                    echo "$gender <br>";
                    echo "$email <br>";
                    echo "$doj<br><br>";
                
            }*/
                

            ?>
        </body>

</html>