<?php

session_start();
if(session_destroy()){
    header("Location : DBMS lab/doc_login.php");
}

?>