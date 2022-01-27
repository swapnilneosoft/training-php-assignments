<?php 

session_start();
session_destroy();
header("Location: http://localhost/training/assignment/proj1/index.php");
?>