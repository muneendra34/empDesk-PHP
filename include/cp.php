<?php
session_start();
include "useractions.php";
$user= new CPassword();

$uu="";
if(isset($_POST['submitButton']))
    {
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {  
           
           if (empty($_POST['password1']))
               {
                 $eErr = "Current Password is required";
                 $pchk=0;
               } 
           else
               {
                 $pass= $_POST['password1'];
                 $pchk=1;  
               }
               
           if (empty($_POST['password2']))
               {
                 $e1Err = "New password is required";
                 $p1chk=0;
               } 
           else
               {
                 $npass1=$_POST['password2'];
                 $p1chk=1;
                 
               }
          if (empty($_POST['password3']))
               {
                 $e2Err = "Re-enter password is required";
                 $p2chk=0;
               } 
           else
               {
                 $npass2=$_POST['password3'];
                 $p2chk=1;
                 
               }
        }
        
        if($pchk==1 && $p1chk==1 && $p2chk==1)
        {
            if($npass1===$npass2)
            {
                if(isset($_SESSION['uname']))
                {
                $uu=$_SESSION['uname'];
                }
                $res=$user->cp($uu,$pass,$npass1);
        if($res)
        {
            $_SESSION['sp']=" Successfully Changed your Password!!";
            
            $_SESSION['lc']=1;
            header('location: changepassword.php');
            
        }
        else
        {
            $_SESSION['st']=" Error!! ";
            $_SESSION['ut']="Current Password is wrong!!";
            $_SESSION['lc']=1;
            header('location: changepassword.php');
        }
            }
            else
            {
            $_SESSION['st']="New and Cofirmed Passwords are must be same";
            $_SESSION['ut']="";
            $_SESSION['lc']=1;
            header('location: changepassword.php');
            }
        }    
    }
 ?>
