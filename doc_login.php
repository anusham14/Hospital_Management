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
        #ext_log{
                padding: 10%;
            }
        #doc_log{
            background-color: rgba(0, 0, 0, 0.4);
            border-radius : 20px;
            padding: 5%;
            width: 60%;
            height :100%;
            margin-left:20%;
            color : white;
        }
    </style>
    
   <nav class="navbar navbar-dark" style="background-color: white;">
            <div class="container-fluid">
                <a class="navbar-brand">APOLO HOSPITAL</a>
            </div>
        </nav>

</head>
    <body>
    <img src="doc_login.jpg" height= "800px" width="100%">
    <div class="card-img-overlay text-dark" style="text-align:center;" id="ext_log">
    <h2 > DOCTOR LOGIN  </h2>
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
