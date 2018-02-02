<?php 
session_start();
include 'include/actions.php';
$actions=new Actions();

if(isset($_SESSION['admin']) || isset($_SESSION['user']))
{
if($_SESSION['admin']=='adminchecked')
{
    header("location: admin.php");
}
else if($_SESSION['user']=='userchecked')
{
    header("location: index.php");
}
}

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
         else{
         $fname= $_POST['fullname'];
         $fchk=1;
        }
      if (empty($_POST['email'])) {
         $eErr = "Email is required";
         $echk=0;
        }
        else {
        $email=$_POST['email'];
        $echk=1;
        }
  
        if (empty($_POST['username'])) {
        $userErr = "Username is required";
        $uchk=0;
        } else {
        $username=$_POST['username'];
        $uchk=1;
        }
        if (empty($_POST['password'])) {
        $passErr = "Password is required";
        $pchk=0;
        } else {
        $password=$_POST['password'];
        $pchk=1;
        }
        
        if (empty($_POST['repassword'])) {
        $rpsdErr = "Re-Enter Password is required";
        $rpchk=0;
        } else {
        $repassword=$_POST['repassword'];
        $rpchk=1;
        }
        
        }
        if($fchk==1 && $echk==1 && $uchk==1 && $pchk==1 && $rpchk==1)
        {
        $res=$actions->register_user($id,$fname,$email,$username,$password,$repassword);
        if($res)
        {
          $_SESSION['register']="Registration Successful !!";
          $_SESSION['rgl']=1;
        }
        else
        {
            $_SESSION['register1']="Registration Falied.."."<br>"."Email or Username already exist...";
            $_SESSION['rgl']=1;
        }
        }  
        
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>empDesk | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrapValidator.min.css">
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script src="bootstrap/js/bootstrapValidator.min.js" type="text/javascript"></script>
    

    <script type="text/javascript" src="scripts/js/register.js"></script>
  
 
</head>
 <body class="hold-transition register-page">
  
      <div class="register-box">
               <div class="register-logo">
                      <a href="#"><b>emp</b>Desk</a>
                </div>
          <div class="row">
      <div class="register-box-body">
           <div class="mess3">
               <h4><?php if(isset($_SESSION['register']) && isset($_SESSION['rgl'])){ if($_SESSION['rgl']==1){ echo "<span class='glyphicon glyphicon-ok'></span>"." ".$_SESSION['register'];$_SESSION['rgl']=0;}}?></h4></div>
                   <div class="mess2"> <h4><?php if(isset($_SESSION['register1']) && isset($_SESSION['rgl'])){ if($_SESSION['rgl']==1){ echo "<span class='glyphicon glyphicon-remove'></span>"." ".$_SESSION['register1'];$_SESSION['rgl']=0;}}?></h4></div>
              <p class="login-box-msg">Register a new membership</p>
<form  action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="contactForm" class="form-horizontal">
    <div class="form-group has-feedback">
            <input type="text" class="form-control" name="fullname" placeholder="Full name"/>
    </div>
    <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email"/>
     </div>
    
	<div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username"/>
        </div>
	
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password"/> 
    </div>
	
    <div class="form-group">   
        <input type="password" class="form-control" name="repassword" placeholder="Confirm Password"/>
    </div>
	
    
    <!-- #messages is where the messages are placed inside -->
    <div class="form-group">
        <div class="col-md-12">
            <div id="messages" class="mess"></div>
        </div>
    </div>
     <div class="row">
    <div class="col-xs-12">
                     <div class="checkbox icheck">
                       <label>
                         &nbsp;&nbsp; <input type="checkbox" name="acceptterms"> I agree to the <a href="#">terms & conditions</a>
                       </label>
                     </div>
    </div><br><br>
    <div class="form-group">
        <div class="col-xs-6">
            <button type="submit" name="submitButton" id="click" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
         <div class="col-xs-6">
            <button type="reset" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
    </div>
         
     </div>
</form>
  <span>If you have already an Account? Please </span><a href="login.php" class="text-center">Login here</a>
      </div><!-- /.form-box -->
    </div>
    </div><!-- /.register-box -->
  </body>
</html>
</body>
</html>