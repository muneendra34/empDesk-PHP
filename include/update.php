<?php
session_start();
include 'useractions.php';
$user=new UpdateUser();
$fname=$email=$username=$password='';
$fErr=$eErr=$uErr=$passErr=$rr=$rr1=$u='';

if(isset($_POST['submitButton']))
{
     $fchk=$echk=$uchk=$pchk="";
    
     if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {  
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
                     $email=$_POST['email'];
                     $echk=1;
               }
  
           if (empty($_POST['username'])) 
               {
                     $uErr = "Username is required";
                     $uchk=0;
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
          
        
          
          if($fchk ==1 && $echk==1 && $uchk == 1 && $pchk ==1)
            {
               $u=$_SESSION['udd'];
               $res=$user->update($fname, $email, $username,$password,$u);
                  if($res)
                     {
                       $_SESSION['st']="Successfully Updated";
                       $_SESSION['ut']=$fname;
                       $_SESSION['lc']=1;
                       header("location: ../admin.php");
                      }
                  else
                      {
                        $rr1="Not successfull"  ;
                        header("location: adminedit.php");
                      }
    
            }
            else
                 {
                    $rr1="* Update Failed";
                  }
     }
}

?>