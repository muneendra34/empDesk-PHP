<?php
session_start();
include 'useractions.php';
$actions=new Actions();

if($actions->get_session()== false)
{
    header('location: ../login.php');
}

$user=new AddUserLog();

  $uErr=$dateErr=$mlginErr=$mlgoutErr=$alginErr=$algoutErr="";
  $uname=$dname=$mlginname=$mlgoutname=$alginname=$algoutname=$ress=$id=$lid="";

   if(isset($_POST['submitButton']))
   {
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {  
   if (empty($_POST['username']))
       {
            $uErr = "UserName is required";
            $uchk=0;
       } 
   else
       {
            $uname=$_POST['username'];
            $uchk=1;
       }
   if (empty($_POST['date']))
       {
            $dateErr = "Date is required";
            $dchk=0;
       }
   else
      {
           $dname= $_POST['date'];
           $dchk=1;
      }
   if (empty($_POST['mlogin']))
       {
          $mlginErr = "Morning Login time is required";
          $mlichk=0;
       }
   else
       {
          $mlginname= $_POST['mlogin'];
          $mlichk=1;
       }
       
        if (empty($_POST['mlogout']))
       {
          $mlgoutErr = "Afternoon Logout time is required";
          $mlgotchk=0;
       }
   else
       {
          $mlgoutname= $_POST['mlogout'];
          $mlgotchk=1;
       }
        if (empty($_POST['alogin']))
       {
          $alginErr = "Afternoon Login time is required";
          $alichk=0;
       }
   else
       {
          $alginname= $_POST['alogin']; 
          $alichk=1;
       }
   if (empty($_POST['alogout'])) 
       {
          $algoutErr = "Evening Logout time is required";
          $algotchk=0;
       }
   else
       {
          $algoutname= $_POST['alogout'];
          $algotchk=1;
       }
 
        }
 

if($uchk==1 && $dchk==1 && $mlichk==1 && $mlgotchk==1 && $alichk==1 && $algotchk==1 )
{
    $res=$user->addlog($uname,$dname,$mlginname,$mlgoutname,$alginname,$algoutname);
        if($res)
        {
            $_SESSION['st']=$username."Successfully Submited";
            $_SESSION['ut']=$uname." log record on ".$dname;
            $_SESSION['lc']=1;
            header("location: userslogs.php");
        }
        else
        {
            $_SESSION['lc']=1;
            $_SESSION['st']="Already Exists ".$uname." Log record in database on ";
            $_SESSION['ut']=$dname;
            header('location: addlog.php');
        }
}
}
?>

