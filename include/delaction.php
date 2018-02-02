<?php
session_start();

include('actions.php');
$actions=new Actions();
    
    if(isset($_POST['delete']))
        {
        if(isset($_POST['selector']))
            {
               $id=$_POST['selector'];
               $N=count($id);
                for($i=0;$i<$N;$i++)
                {
                    $sq="DELETE FROM log where l_id='$id[$i]'";
                    $result = mysqli_query($db->con(),$sq);
                }
        
        if(isset($result))
            {
                $_SESSION['st'] = 'Selected Log records have been deleted successfully.';
                $_SESSION['ut']='';
                header("Location: userslogs.php");
            }
            else 
               { 
                $_SESSION['st'] = 'Try Again';
                $_SESSION['ut']='';
                header("Location: userslogs.php");
                }
     
                }
           } 
           
?>