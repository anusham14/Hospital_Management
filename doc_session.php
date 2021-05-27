<?php
        require("dbconn.php");
        session_start();

        $user_check = $_SESSION['login_user'];
   
        $ses = mysqli_query($connect,"SELECT name from doctors WHERE name = '$user_check' ");
        
        $row = mysqli_fetch_array($ses);
        
        $doc_session = $row['name'];
        
        if(!isset($_SESSION['login_user'])){
                header("location:doc_login.php");
                die();
        }
?>