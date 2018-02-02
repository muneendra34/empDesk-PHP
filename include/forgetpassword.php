<?php 
require_once 'dbConnect.php';
$db=new dbConnect();

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

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['username']) && isset($_POST['email']))
    {
$user=$_POST['username'];
$email=$_POST['email'];
    }
    
$sql="select password from user where username='$user' and email='$email' and username<>'admin'";
$res=  mysqli_query($db->con(), $sql);
$row=  mysqli_fetch_assoc($res);
$rows=  mysqli_num_rows($res);
if($rows==1)
{
$_SESSION['forpswd']=$row['password'];
$c=1;
}
else if($rows==0)
{
   $_SESSION['error']="Error!!";
   $c=0;
}

}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>empDesk | Forget password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
     <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/css/jquery.dataTables.min.css">
   
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body class="hold-transition login-page"><br><br><br><center>
      <div class="login-box"><h2 style="color:white"><b>Recovering Password</b></h2>
     <div class="login-box-body">
        <p class="login-box-msg">Enter Username</p>
       
         <form action="<?php echo $_SERVER['PHP_SELF']?>" id="contactForm" name="ff" method="post">
           
             <div class="form-group has-feedback">
              <input type="text"  name="username" class="form-control" placeholder="User Name" >
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
             </div>
             
             <div class="form-group has-feedback">
              <input type="text"  name="email" class="form-control" placeholder="Email" >
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             </div>
          
             
                  <div class="mess4">
                      <h4>
                          <?php if(isset($_SESSION['forpswd'])){
                           if($c==1){   
                          echo "Password: ".$_SESSION['forpswd'];
                           $c=0;}
                          }
                     ?></h4>
                  </div>
              </div>
          <div class="mess2">
                     
                          <?php 
                          if(isset($_SESSION['error']))
                          { if($c==0){
                          echo $_SESSION['error'];
                          $c=1;}
                          }
                     ?>
                  </div>
              </div>
          
      <div class="row"><div class="col-xs-3"></div>
                <div class="col-xs-6">
                  <button type="submit" name="btn-login" id="click" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div><!-- /.col -->
                </div>
             
         </form>
        <h3><a href="../login.php"><div style="color: white"><u>Login</u></div></a></h3>
      </div><!-- /.login-box-body -->
      </div>   
   
  </body>
</html>


