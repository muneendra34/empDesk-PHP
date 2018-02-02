<?php
session_start();
include('useractions.php');
$user=new DeleteAllLogs();

$res=$user->dellogs();
if($res)
{
    $_SESSION['st']="Successfully Deleted";
    $_SESSION['achk']=1;    
    $_SESSION['ut']=" All Logs.";
    $_SESSION['lc']=1;
    header("location: userslogs.php");
}
else
{
    $_SESSION['st']="Can't Delete";
    $_SESSION['ut']=" ";
    header("location: userslogs.php");
}

?>
