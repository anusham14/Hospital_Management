<?php
        require("dbconn.php");
        session_start();
        
        //using sessions to save doctor id 
        $docid_check = $_SESSION['docid'];

        $ses1 = mysqli_query($connect,"SELECT id from doctors WHERE id = '$docid_check' ");

        $row = mysqli_fetch_array($ses1);
        
        $doc_id = $row['id'];
        
?>