<?php 
session_start();
include ('include/actions.php');
$action=new Actions();

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

class UserCheck
{
    public function check_user($username,$password)
    {
     global $db;
        $sql="SELECT * FROM user WHERE username='$username' && password='$password'";
        $result= mysqli_query($db->con(),$sql);
        $user_data=mysqli_fetch_assoc($result);
        $no_rows= mysqli_num_rows($result);
        
        if($no_rows==1)
        {
            if($user_data['username']=='admin')
            {
                $_SESSION['admin']="adminchecked";
                $_SESSION['fname']=$user_data['fullname'];
                $_SESSION['uname']=$user_data['username'];
                return true;
            }
            else
            {
                $_SESSION['user']="userchecked";
                $_SESSION['fname']=$user_data['fullname'];
                $_SESSION['uname']=$user_data['username'];
                return true;
            }
        }
        else
        {
            $_SESSION['login']="Incorrect Values";
            $_SESSION['lgc']=1;
            return false;
        }
}
}
$actions=new UserCheck();

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $login=$actions->check_user($_POST['username'],$_POST['password']);
    if($login)
    {
        if($_SESSION['uname']=='admin')
        {
        header('location: admin.php');
        }
        else
        {
            header('location: index.php');
        }
    }
    else
    {
                        
    }
    
}
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>empDesk | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style --> 
    <link rel="stylesheet" href="dist/css/skins/ionicons.min.css" type="text/css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
     <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
     <script src="bootstrap/js/bootstrapValidator.min.js" type="text/javascript"></script>
     <link rel="stylesheet" href="bootstrap/css/bootstrapValidator.min.css">
   
     <script type="text/javascript" src="scripts/js/login.js">
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
          <a href="#"><b>emp</b>Desk</a> 
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>
       
         <form action="<?php echo $_SERVER['PHP_SELF']?>" id="contactForm" name="ff" method="post">
           
             <div class="form-group has-feedback">
              <input type="text"  name="username" class="form-control" placeholder="User Name" >
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
             </div>
          
             <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password" >
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
             </div><?php  ?>
              <div>
                  <div class="mess2">
                      <h4>
                          <?php 
                      if(isset($_SESSION['login']) && isset($_SESSION['lgc'])){ if($_SESSION['lgc']==1){ echo "<span class='glyphicon glyphicon-remove'></span>"." ".$_SESSION['login'];$_SESSION['lgc']=0;}}?></h4>
                  </div>
              </div>
              <!-- #messages is where the messages are placed inside -->
    <div class="form-group">
        <div class="col-md-12">
            <div id="messages" class="mess"></div><br>
        </div>
    </div>
              
              <div class="row">
                  <div class="col-xs-8">
                <div class="checkbox icheck">
                   <label>
                        &nbsp;&nbsp;  <input type="checkbox"> Remember Me
                   </label>
                </div>
                </div><!-- /.col -->
             
                <div class="col-xs-4">
                  <button type="submit" name="btn-login" id="click" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
             </div>
             
         </form>

        <a href="include/forgetpassword.php">I forgot my password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="register.php" class="text-center">Register a new Account</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

   
  </body>
</html>

