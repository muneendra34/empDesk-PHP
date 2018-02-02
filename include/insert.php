<?php
session_start();
include('useractions.php');
$user=new AddUser();

$fname=$email=$username=$password=$id='';
$fErr=$eErr=$uErr=$passErr=$rr1='';
$fchk=$echk=$uchk=$pchk=$rpchk="";

if(isset($_POST['submitButton']))
    {
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {  
           $id="EMP".rand(000000,999999);
           
           if (empty($_POST['fullname']))
               {
                 $fErr = "Full Name is required";
                 $fchk=0;
               } 
           else
               {
                 $fname= $_POST['fullname'];
                 $fchk=1;  
               }
               
           if (empty($_POST['email']))
               {
                 $eErr = "Email is required";
                 $echk=0;
               } 
           else
               {
                 $email=$_POST['email']; echo "success";
                 $echk=1;
                 
               }
               
           if (empty($_POST['username']))
               {
                $uErr = "Username is required";
                $ichk=0;
               }
           else
                {
                $username=$_POST['username'];
                $uchk=1;
                }
            
           if (empty($_POST['password']))
               {
                $passErr = "Password is required";
                $pchk=0;
               }
           else 
               {
                $password=$_POST['password'];
                $pchk=1;
               }
            
           if (empty($_POST['repassword']))
               {
               $rpsdErr = "Re-Enter Password is required";
               $rpchk=0;
               }
           else 
               {
               $repassword=$_POST['repassword'];
               $rpchk=1;
               }
        }
        
        
  if($fchk==1 && $echk==1 && $uchk==1 && $pchk==1 && $rpchk==1)
  {    
    $res=$user->add($id,$fname,$email,$username,$password,$repassword);
    if($res)
    {
    $_SESSION['st']=" Successfully Added a User ";
    $_SESSION['ut']=$username;
    $_SESSION['lc']=1;
    header("location: ../admin.php");
    }
    else
    {
        $_SESSION['err']="Failed to add user";
        $_SESSION['lc']=1;
        header('location: useradd.php');
    }
  }
  else
        {
            $rr1="Try Again";
            header('location: useradd.php');
        }
}
?>

