<?php
session_start();

include 'actions.php';
$actions=new Actions();
    
    if(isset($_POST['delete']))
        {
        if(isset($_POST['selector']))
            {
               $id=$_POST['selector'];
               $N=count($id);
                for($i=0;$i<$N;$i++)
                {
                    $sq="DELETE FROM user where id='$id[$i]' && username<>'admin'";
                    $result = mysqli_query($db->con(),$sq);
                }
        
        if(isset($result))
            {
                $_SESSION['st'] = 'Selected Users has deleted successfully.';
                $_SESSION['ut']='';
                header("Location: ../admin.php");
            }
            else 
               { 
                $_SESSION['st'] = 'Try Again';
                $_SESSION['ut']='';
                header("Location: ../admin.php");
                }
     
                }
           } 
           
?>

