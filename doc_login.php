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
            width : 30%;
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
    </style>

</head>
<body>
    
    <nav class="navbar navbar-light" style="background-color: white;">
         <div class="container-fluid">
         <a class="navbar-brand">APOLO HOSPITAL</a>
         <ul class="nav nav-pills">
                <li class="active">
                    <form method="get" action="home.php">
                    <button type="submit" class="btn btn-outline-primary" id="dbt" name="dbt">Back</button>
                    </form>
                </li>
                
            </ul>
        </div>
    </nav> 


    <img src="form.png" height= "100%" width="100%">
    <div class="card-img-overlay text-light" id="login">
    <br><br>
    <h2 style="text-align:center;"> DOCTOR LOGIN  </h2><br>
        <form method="post" action="" style="text-align:center;" id="doc_log">
                <tr>
                <td>Name &emsp;&emsp;&emsp;&emsp;: </td>
                <td><input type="text" name="name" required></td>
                <br><br>
                </tr>      
                
                <tr>
                    <td>Enter password : </td>
                    <td><input type="password" name="pass" required></td>
                    <br>
                </tr>
        
            <br>
            <input type="submit" class="btn btn-primary" name="Login" value="Login">
            <br><br>
            Not yet registered? Click to 
            <a href="http://localhost/DBMS%20lab/doc_register.php">Register.</a><br>
            </form>
    </div>
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
                  $query = mysqli_query($connect,"SELECT name,pass FROM doctors WHERE name='$name' AND pass='$pass'");
                  $rows = mysqli_num_rows($query); 
                  //if matched then row = 1 
                  if($rows == 1){
                    $_SESSION['login_user'] = $name;
                    header("Location:doc_profile.php");
                  }
                  else{
                      echo "Invalid name or password!!";
                  }
              }

              ?>
        
    </body>
</html>
