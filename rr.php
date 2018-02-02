<?php 
include 'include/actions.php';
$actions=new Actions();

if(isset($_POST['submit']))
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {  
          $id="EMP".rand(000000,999999);
        
      if (empty($_POST['fname'])) 
         {
         $fErr = "Full Name is required";
         $fchk=0;
         } 
         else{
         $fname= $_POST['fname'];
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
        $password=md5($_POST['password']);
        $pchk=1;
        }
        
        if (empty($_POST['repassword'])) {
        $rpsdErr = "Re-Enter Password is required";
        $rpchk=0;
        } else {
        $repassword=$_POST['repassword'];
        $rpchk=1;
        }
       
        if($fchk==1 && $echk==1 && $uchk==1 && $pchk==1 && $rpchk==1)
        {
        $res=$actions->register_user($id,$fname,$email,$username,$password,$repassword);
        if($res)
        {
        header("location: include/cc.php");
        }
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
    <script type="text/javascript">
      $(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fullName: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'The user name is required and cannot be empty'
                    },
                    stringLength: {
                        max: 15,
                        message: 'The Username must be less than 15 characters long'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        max: 8,
                        message: 'The password must be less than 8 characters long'
                    }
                }
            },
            repassword: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        max: 8,
                        message: 'The password must be less than 8 characters long'
                    }
                }
            }
            
        }
    });
});
    </script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="hold-transition register-page">
  
      <div class="register-box">
               <div class="register-logo">
                      <a href="#"><b>emp</b>Desk</a>
                </div>

      <div class="register-box-body">
              <p class="login-box-msg">Register a new membership</p>
        
                 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="fff" id="contactForm" method="post">
           
                     <div class="form-group has-feedback">
                             <input type="text" name="fname" class="form-control" placeholder="Full name">
                             <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            
                     </div>
                     
                     <div class="form-group has-feedback">
                             <input type="email" name="email" class="form-control" placeholder="Email">
                             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            
                    </div>
                     
                    <div class="form-group has-feedback">
                            <input type="username" name="username" class="form-control" placeholder="User Name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            
                    </div>
          
                    <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            
                    </div>
          
                    <div class="form-group has-feedback">
                            <input type="password" name="repassword" class="form-control" placeholder="Retype password">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            
                    </div>
              
                     <!-- #messages is where the messages are placed inside -->
                    <div class="form-group">
                          <div class="col-xs-8">
                           <div id="messages"></div>
                          </div>
                    </div>
                     
          <div class="row">
            
                <div class="col-xs-8">
                     <div class="checkbox icheck">
                       <label>
                         &nbsp;&nbsp; <input type="checkbox"> I agree to the <a href="#">terms</a>
                       </label>
                     </div>
               </div><!-- /.col -->
            
               <div class="col-xs-4">
                     <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div><!-- /.col -->
          </div>
        </form>
 
              
        <a href="login.php" class="text-center">I already have an Account</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
  </body>
</html>
