<?php
session_start();
include 'useractions.php';
$user=new UserAddLog();
$actions=new Actions();
$flag=new FlagCheck();
if($actions->get_session()== false)
{
    header('location: ../login.php');
}

  $uErr=$dateErr=$lginErr=$lgoutErr="";
  $uname=$dname=$lginname=$lgoutname=$ress=$id=$lid="";
  $ichk=$fck="";

date_default_timezone_set("Asia/Kolkata");
  if(date('A', strtotime(date("d/m/Y H:i:s"))) == 'AM' )
{ 

  $fck=$flag->fetchFlag1($_POST['date1'],$_SESSION['uname']);

    if($fck)
    {
      if(isset($_POST['submitButton']))
     {
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {  
     
     if (empty($_POST['date1']))
         {
              $dateErr = "Date is required";
              $ichk=0;
         }
     else
        {
             $dname= $_POST['date1'];
             $ichk=1;
        }
     
     if (empty($_POST['mouttime'])) 
         {
            $lgoutErr = "Logout time is required";
            $ichk=0;
         }
     else
         {
            $lgoutname= $_POST['mouttime'];
            $ichk=1;
         }

      }
    }

    $uname=$_SESSION['uname'];

    if($ichk==1)
    {
        $res1=$user->uaddlog1($uname,$dname,$lgoutname);
            if($res1)
            {
                $_SESSION['st']="Successfully Submited";
                $_SESSION['ut']=" log record";
                $_SESSION['lc']=1;
                header("location: usermylogs.php");
            }
            else
            {
                $_SESSION['lc']=1;
                $_SESSION['lcc']=1;
                $_SESSION['ress']="Already Exists your Log record in database on ".$dname;
                header('location: ../index.php');
            }
    
          }
       
       else
       {
           header("location: ../index.php");
       }
        

    }








    else
    {

    if(isset($_POST['submitButton']))
     {
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {  
     
     if (empty($_POST['date1']))
         {
              $dateErr = "Date is required";
              $ichk=0;
         }
     else
        {
             $dname= $_POST['date1'];
             $ichk=1;
        }
     if (empty($_POST['mintime']))
         {
            $lginErr = "Login time is required";
            $ichk=0;
         }
     else
         {
            $lginname= $_POST['mintime'];
            $ichk=1;
         }
     

      }
    }

$uname=$_SESSION['uname'];

if($ichk==1)
{
    $res=$user->uaddlog($uname,$dname,$lginname);
        if($res)
        {
            $_SESSION['st']="Successfully Submited";
            $_SESSION['ut']=" log record";
            $_SESSION['lc']=1;
            header("location: usermylogs.php");
        }
        else
        {
            $_SESSION['lc']=1;
            $_SESSION['lcc']=1;
            $_SESSION['ress']="Already Exists your Log record in database on ".$dname;
            header('location: ../index.php');
        }
        
     }
   
   else
   {
       header("location: ../index.php");
   }
 }
}








  // if( ) 'AM' or 'PM' check
else
{
    $fck3=$flag->fetchFlag3($_POST['date2'],$_SESSION['uname']);

    if($fck3)
    {
      if(isset($_POST['submitButton1']))
     {
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {  
     
     if (empty($_POST['date2']))
         {
              $dateErr = "Date is required";
              $ichk=0;
         }
     else
        {
             $dname= $_POST['date2'];
             $ichk=1;
        }
     
     if (empty($_POST['aouttime'])) 
         {
            $lgoutErr = "Logout time is required";
            $ichk=0;
         }
     else
         {
            $lgoutname= $_POST['aouttime'];
            $ichk=1;
         }

      }
    }

    $uname=$_SESSION['uname'];

    if($ichk==1)
    {
        $res1=$user->uaddlog2($uname,$dname,$lgoutname);
            if($res1)
            {
                $_SESSION['st']="Successfully Submited";
                $_SESSION['ut']=" log record";
                $_SESSION['lc']=1;
                header("location: usermylogs.php");
            }
            else
            {
                $_SESSION['lc']=1;
                $_SESSION['lcc']=1;
                $_SESSION['ress']="Already Exists your Log record in database on ".$dname;
                header('location: ../index.php');
            }
    
          }
       
       else
       {
           header("location: ../index.php");
       }
        

    }

   







    else
    {

    if(isset($_POST['submitButton1']))
     {
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {  
     
     if (empty($_POST['date2']))
         {
              $dateErr = "Date is required";
              $ichk=0;
         }
     else
        {
             $dname= $_POST['date2'];
             $ichk=1;
        }
     if (empty($_POST['aintime']))
         {
            $lginErr = "Login time is required";
            $ichk=0;
         }
     else
         {
            $lginname= $_POST['aintime'];
            $ichk=1;
         }

      }
    }

$uname=$_SESSION['uname'];

if($ichk==1)
{
    $res=$user->uaddlog3($uname,$dname,$lginname);
        if($res)
        {
            $_SESSION['st']="Successfully Submited";
            $_SESSION['ut']=" log record";
            $_SESSION['lc']=1;
            header("location: usermylogs.php");
        }
        else
        {
            $_SESSION['lc']=1;
            $_SESSION['lcc']=1;
            $_SESSION['ress']="Already Exists your Log record in database on ".$dname;
            header('location: ../index.php');
        }

     }
   
   else
   {
       header("location: ../index.php");
   }
 }
}

?>