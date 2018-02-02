<?php
session_start();
include('actions.php');
$user=new Actions();
$uid=$ud='';
if(isset($_GET['username']) && isset($_GET['date']))
{
$uid=$_SESSION['udd']=$_GET['username'];
$ud=$_GET['date'];
$sql="delete from log where username='$uid' && date='$ud'";
$res=mysqli_query($db->con(),$sql);
if(isset($res))
{
    $_SESSION['st']="Successfully Deleted";
    $_SESSION['achk']=1; 
    $_SESSION['ut']=$uid." Log record on ".$ud;
    $_SESSION['lc']=1;
    header("location: userslogs.php");
}
}
?>
