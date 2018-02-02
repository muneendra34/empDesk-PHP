<?php
session_start();
include_once ('actions.php');
$actions= new Actions();

if($actions->get_session()== false)
{
    header('location: login.php');
}

?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LWS User's Hub | Admin</title>
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
    <script src="../dist/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../dist/js/dataTables.bootstrap.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/jquery.dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/jquery.dataTables.select.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/jquery.dataTables.editor.min.js" type="text/javascript"></script>
    
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
  
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
           <!-- Logo -->
           <a href="#" class="logo">
                 <!-- mini logo for sidebar mini 50x50 pixels -->
                 <span class="logo-mini"><b>LWS</b></span>
                 <!-- logo for regular state and mobile devices -->
                 <span class="logo-lg"><b>LWS</b>&nbsp;Users Hub</span>
           </a>
           
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
               <span class="sr-only">Toggle navigation</span>
            </a>
          
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
             
                   <!-- User Account: style can be found in dropdown.less -->
                   <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <img src="../dist/img/profile.jpg" class="user-image" alt="User Image">
                             <span class="hidden-xs"><?php echo ucfirst($_SESSION['fname']);?></span>
                        </a>
                       
                    <ul class="dropdown-menu">
                         <!-- User image -->
                         <li class="user-header">
                         <img src="../dist/img/profile.jpg" class="img-circle" alt="User Image">
                          <p>
                             <?php echo ucfirst($_SESSION['fname']);?> - Web Developer
                             <small>in LWS since Nov. 2012</small>
                         </p>
                         </li>
                  
                     <!-- Menu Footer-->
                    <li class="user-footer">
                         <div class="pull-left">
                         <a href="#" class="btn btn-default btn-flat">Profile</a>
                         </div>
                        
                        <div class="pull-right">
                            <a href="include/logout.php" class="btn btn-default btn-flat">Log out</a>
                        </div>
                    </li>
                    </ul>
                  
                   </li>
            </ul>
          </div>
        </nav>
      </header>
      
        
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
             <!-- sidebar: style can be found in sidebar.less -->
           <section class="sidebar">
                        <!-- Sidebar user panel -->
                <div class="user-panel">
                      
                    <div class="pull-left image">
                             <img src="../dist/img/profile.jpg" class="img-circle" alt="User Image">
                    </div>
            
                    <div class="pull-left info">
                             <p><?php echo ucfirst($_SESSION['fname']);?></p>
                             <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        
                    </div>
                </div>
          
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                 <ul class="sidebar-menu">
                 <li class="header"><center><h4>Admin Panel Controls</h4></center></li>
                 <li><a href="../admin.php"><?php if(!isset($_SESSION['lc'])){$_SESSION['lc']='';} if($_SESSION['lc']==0) {unset($_SESSION['st']);unset($_SESSION['ut']);}else{$_SESSION['lc']=0;}?><i class="fa fa-angle-left"></i>Home</a></li>
                 <li><a href="deleteallusers.php"><i class="fa fa-angle-left"></i>Delete All Users</a></li>
                 <li><a href="userslogs.php"><i class="fa fa-angle-left"></i>View Users Logs</a></li>
                 <li><a href="dlogs.php"><i class="fa fa-angle-left"></i>Delete All Logs</a></li>
                 <li><a href="logout.php"><i class="fa fa-angle-left"></i>Logout</a></li> 
                 </ul>                  
               </section>
                   
             <!-- /.sidebar -->
      </aside>
       
        <div class="content-wrapper">
            <br><br><br>  <div class="row col-lg-10 ">
            <div class="col-md-6">
          <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../dist/img/profile.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo ucfirst($_SESSION['fname']);?></h3>
                  <p class="text-muted text-center">Web Developer in LWS since Nov. 2012</p>
                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div><!-- /.box-body -->
          </div><!-- /.box -->   </div></div>
        </div>
    </body>
    </html>