<?php

session_start();
if(session_destroy()){
    header("Location : DBMS lab/patient_login.php");
}

?>