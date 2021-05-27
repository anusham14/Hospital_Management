<?php
        require("dbconn.php");
        session_start();

        //using sessions save the patient name 
        $user_check = $_SESSION['pname'];
   
        $ses = mysqli_query($connect,"SELECT name from patients WHERE name = '$user_check' ");
        
        $row = mysqli_fetch_array($ses);
        
        $searchp_session = $row['name'];
        
        //using sessions to save doctor id 
        $docid_check = $_SESSION['docid'];

        $ses1 = mysqli_query($connect,"SELECT id from doctors WHERE id = '$docid_check' ");

        $row = mysqli_fetch_array($ses1);
        
        $doc_id = $row['id'];
        
?>