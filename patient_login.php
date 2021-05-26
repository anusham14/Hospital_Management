<html>
<head>
   <h2> PATIENT LOGIN  </h2> 
</head>
    <body>
        <form method="post" action="">
            <table>
                <tr>
                <td>Name : </td>
                <td><input type="text" name="name" required></td>
                <br><br>
                </tr>      
                
                <tr>
                    <td>Enter password : </td>
                    <td><input type="password" name="pass" required></td>
                    <br><br>
                </tr>
            </table>
            <br>
            <input type="submit" name="Login" value="Login">
            <br>
            Not yet registered? Click to 
            <a href="http://localhost/DBMS%20lab/patient_register.php">Register.</a><br>
            <?php
              //redirect to another php page
              /*if(!empty($_POST["Register"]))
              {
                header("Location:doc_register.php");
                exit;
              
              }*/
              require("dbconn.php");
              //start a session
              //a session stores variable required for other page
              session_start();
              $name = $_POST["name"];
              $pass = $_POST["pass"];

              //work if name & password aren't empty
              if(!empty($name) && !empty($pass)){

                  //select if name & pass match with db
                  $query = mysqli_query($connect,"SELECT name,password FROM patients WHERE name='$name' AND password='$pass'");
                  $rows = mysqli_num_rows($query); 
                  //if matched then row = 1 
                  if($rows == 1){
                    $_SESSION['login_user'] = $name;
                    header("Location:patient_profile.php");
                  }
                  else{
                      echo "Invalid name or password!!";
                  }
              }

              ?>
        </form>
    </body>
</html>
