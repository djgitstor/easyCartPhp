<?php
// Start the session and get the data
session_start();
session_unset();
session_destroy();
// echo "<be> You have been logged out ";
header("location:../signin.php");
?>