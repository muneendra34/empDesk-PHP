<?php
session_start();
include 'useractions.php';
$user=new DeleteUser();
$uid=$unm='';
if(isset($_GET['id']) && isset($_GET['username']))
{
$uid=$_SESSION['uii']=$_GET['id'];
$unm=$_GET['username'];
$res=$user->delete($uid);
if($res)
{ 
if($unm=='admin')
{
   $_SESSION['st']="Can't be Delete";
    $_SESSION['ut']=$unm;
    header("location: ../admin.php");
}
else
{
    $_SESSION['st']="Successfully Deleted";
    $_SESSION['achk']=1;
    $_SESSION['ut']=$unm;
    $_SESSION['lc']=1;
    header("location: ../admin.php");
}
}
}
?>
