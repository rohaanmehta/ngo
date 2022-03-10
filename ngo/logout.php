<?php
 session_start();
 session_destroy();   
 header("Location: login.php");
unset($_SESSION['logindone']);

?>