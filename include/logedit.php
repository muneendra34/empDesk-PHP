<?php
session_start();
include 'useractions.php';
$user=new EditUserLog();

$uErr=$dateErr=$mlginErr=$lgoutErr=$alginErr=$algoutErr="";
$username=$dname=$minname=$moutname=$ainname=$aoutname=$uid=$did=$id=$lid=$us=$ud="";
$uchk=$dchk=$mlchk=$mochk=$alchk=$aochk="";
$uus=$udd="";

  
if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {  
   if (empty($_POST['username'])) {
    $uErr = "UserName is required";
    $uchk=0;
  } else{
    $uname=$_POST['username'];
    $uchk=1;
  }
  if (empty($_POST['date'])) {
    $dateErr = "Date is required";
    $dchk=0;
  } else{
    $dname= $_POST['date'];
    $dchk=1;
  }
  if (empty($_POST['mlogin'])) {
    $mlginErr = "Morning Login time is required";
    $mlchk=0;
  } else{
    $minname= $_POST['mlogin'];
    $mlchk=1;
  }
  if (empty($_POST['mlogout'])) {
    $mlgoutErr = "Afternoon Logout time is required";
    $mochk=0;
  } else{
    $moutname= $_POST['mlogout'];
    $mochk=1;
  }
  if (empty($_POST['alogin'])) {
    $alginErr = "Afternoon Login time is required";
    $alchk=0;
  } else{
    $ainname= $_POST['alogin'];
    $alchk=1;
  }
  if (empty($_POST['alogout'])) {
    $algoutErr = "Evening Logout time is required";
    $aochk=0;
  } else{
    $aoutname= $_POST['alogout'];
    $aochk=1;
  }
  
  }  
$uus=$_SESSION['ab'];
$udd=$_SESSION['cd'];
 
if($uchk==1 && $dchk==1 && $mlchk==1 && $mochk==1 && $alchk==1 && $aochk==1)
{
        $res=$user->editlog($uname,$dname,$minname,$moutname,$ainname,$aoutname,$uus,$udd);
        if($res)
            {
                $_SESSION['st']="Successfully Updated ";
                $_SESSION['ut']=$uname;
                $_SESSION['lc']=1;
                header("location: userslogs.php");
            }
        else
            {
                $_SESSION['st']="Failed ";
                $_SESSION['ut']='to Edit'.$uname;
                $_SESSION['lc']=1;
                header("location: userslogs.php");
            }
}

?>