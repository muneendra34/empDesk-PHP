<?php
session_start();
require_once 'actions.php'; 
$actions=new Actions();
$actions->user_logout();
header('location: ../login.php'); 
?>
