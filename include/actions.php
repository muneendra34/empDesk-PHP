<?php

require_once 'dbConnect.php';


class Actions
{
 public $db;
    public function __construct() 
    {
       global $db;
       $db=new dbConnect(); 
    }
    
    public function __destruct() 
    {
      
    }
    
    
    public function register_user($id,$fname,$email,$uname,$password,$repassword)
    {
        global $db;
        $sql=  mysqli_query($db->con(),"select * from user where username='$uname'");
        $no_rows=  mysqli_num_rows($sql);
        if($no_rows==0)
        {
            $query="insert into user values('$id','$fname','$email','$uname','$password')";
            $result= mysqli_query($db->con(),$query)or die('Oops!! Error Occured while inserting->'.mysqli_error());
            if($result)
            {
            return true;
            }
        }
        else
        {
            return false;
        }
    }


    public function get_session()
    {
        if(isset($_SESSION['admin']))
        {
        if( $_SESSION['admin']=="adminchecked")
        {
            return true;
        }
        }
        elseif(isset($_SESSION['user']))
        {
        if($_SESSION['user']=="userchecked")
        {
            return true;
        }
        }
        else
        {
            return false;
        }
        
    }
    
    public function user_logout()
    {
        $_SESSION['admin']="checked";
        $_SESSION['user']="checked";
        session_destroy();
         
    }
 
}
?>
