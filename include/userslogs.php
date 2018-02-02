<?php 
session_start();
include 'actions.php';
$actions=new Actions();

if($actions->get_session()== false)
{
    header('location: ../login.php');
}


?>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>empDesk | Admin</title>
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
    
    <script type="text/javascript">
    $(document).ready(function(){
    $('#myTable').dataTable();
     }); 
     
    function deleteConfirm()
    {
    var result = confirm("Are you sure to delete selected Log records?");
    if(result){
        return true;
    }else{
        return false;
    }
    }

    $(document).ready(function()
    {
    $('#select_all').on('click',function()
    {
        if(this.checked)
        {
            $('.checkbox').each(function()
            {
                this.checked = true;
            });
        }
        else
        {
             $('.checkbox').each(function()
             {
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function()
    {
        if($('.checkbox:checked').length == $('.checkbox').length)
        {
            $('#select_all').prop('checked',true);
        }
        else
        {
            $('#select_all').prop('checked',false);
        }
    });
    });
    </script>
    
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
          <span class="logo-mini"><b>eD</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>emp</b>Desk</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
               <!-- inner menu: contains the actual data -->
                   
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="../dist/img/profile.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo ucfirst($_SESSION['uname']);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      <img src="../dist/img/profile.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo ucfirst($_SESSION['uname']);?> - Web Developer
                     
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
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
                <p><?php echo ucfirst($_SESSION['uname']);?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          <li class="header"><center><h4>Admin Panel</h4></center></li>
           
           <li><a href="../admin.php"><i class="glyphicon glyphicon-home"></i>
           &nbsp;<span>Home</span>
         <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i></span></a></li>
           
           <li><a href="deleteallusers.php"><i class="glyphicon glyphicon-user"></i>&nbsp;<span>Delete All Users</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i></span></a></li>
          
          <li><a href="userslogs.php"><?php if(!isset($_SESSION['lc'])){$_SESSION['lc']='';} if($_SESSION['lc']==0) {unset($_SESSION['st']);unset($_SESSION['ut']);}else{$_SESSION['lc']=0;}?><i class="glyphicon glyphicon-th-list"></i>&nbsp;<span>View Users Logs</span><span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i></span></a></li>
          
          <li><a href="dlogs.php"><i class="glyphicon glyphicon-align-justify"></i>&nbsp;<span>Delete All Logs</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a></li>
          
          <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>&nbsp;<span>Logout</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a></li> 
        </ul>                  
        </section>
        <!-- /.sidebar -->
      </aside>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         
         
          <form action="delaction.php" method="post" >
          <div class="box">
            <div class="box-header with-border">
                <div class="mess3"><h4><?php if(isset($_SESSION['st']) && isset($_SESSION['ut'])){ echo "<span class='glyphicon glyphicon-ok'></span>"."&nbsp;&nbsp;".$_SESSION['st']." ".$_SESSION['ut'];}?></h4></div>
                <br>  <h2 class="box-title">Users List</h2>
                <div align="center">
                    
                    <a href="addlog.php"><button type="button" class="btn btn-success">Add Log</button></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="submit" name="delete"  value="Delete Logs"  onclick="return deleteConfirm();" class="btn btn-danger">    
                </div>
              <div class="box-tools pull-right">
              </div></div>
          <?php include 'logtable.php';?>   
          </div>

  </form>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
           
        </ul>
        <!-- Tab panes -->  
          </div><!-- /.tab-pane -->
        </div>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg">
      </div>
    </div><!-- ./wrapper -->
  </body>
</html>
