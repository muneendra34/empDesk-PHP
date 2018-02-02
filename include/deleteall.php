<?php
session_start();
include('useractions.php');
$user=new DeleteAllUsers();
$res1=$user->deleteAll();
if($res1)
{ 
    $_SESSION['st']="Successfully Deleted all users";
    $_SESSION['ut']='';
    $_SESSION['lc']=1;
    header("location: ../admin.php");
}
else
{
    $_SESSION['st']="Can't Delete";
    $_SESSION['ut']='';
    header("location: ../admin.php");
}

?>
