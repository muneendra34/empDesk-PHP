<?php 
session_start();
include "include/useractions.php";
$actions= new Actions();


if(isset($_SESSION['admin']))
{
if($_SESSION['admin']=='adminchecked')
{
    header("location: admin.php");
    
}
}

if($_SESSION['user']<>"userchecked")
{
    header('location: login.php');
}

$unm=$_SESSION['user'];

$defaultval=new DefaultTimeValues();
$defaultval->getTime($unm);


?>

<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>empDesk | User Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
     <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <script type="text/javascript" src="scripts/js/index.js"></script>
   
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="bootstrap/js/bootstrapValidator.min.js" type="text/javascript"></script>
     <link rel="stylesheet" href="bootstrap/css/bootstrapValidator.min.css">
     
    
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
           
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="dist/img/profile.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php if(isset($_SESSION['fname'])) echo ucfirst($_SESSION['fname']);?></span>
                </a>
                
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <img src="dist/img/profile.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php if(isset($_SESSION['fname'])) echo ucfirst($_SESSION['fname']);?> - Web Developer
                      
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <a href="include/userprofile.php" class="btn btn-default btn-flat">Profile</a>
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
                <img src="dist/img/profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php if(isset($_SESSION['fname'])) echo ucfirst($_SESSION['fname']);?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><center><h4>User Panel</h4></center></li>
          <li><a href="index.php"><?php if(!isset($_SESSION['lc'])){$_SESSION['lc']='';} if($_SESSION['lc']==0) {unset($_SESSION['ress']);}else{$_SESSION['lc']=0;}?><i class="glyphicon glyphicon-home"></i><span>&nbsp;Home</span></a></li>
          <li><a href="include/usermylogs.php"><?php if(!isset($_SESSION['lc'])){$_SESSION['lc']='';} if($_SESSION['lc']==0) {unset($_SESSION['st']);unset($_SESSION['ut']);}else{$_SESSION['lc']=0;}?><i class="glyphicon glyphicon-user"></i>&nbsp;
                    <span>My Log Details</span></a></li>
         <li><a href="include/changepassword.php"><?php if(!isset($_SESSION['lc'])){$_SESSION['lc']='';} if($_SESSION['lc']==0) {unset($_SESSION['st']);unset($_SESSION['ut']);}else{$_SESSION['lc']=0;}?><i class="glyphicon glyphicon-cog"></i>&nbsp;<span>Change Password</span></a></li>
          <li><a href="include/logout.php"><i class="glyphicon glyphicon-log-out"></i>&nbsp;<span>Logout</span></a></li> </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
   
          <div class="container"><br>
             
                <div class="mess2"><h4><?php if(isset($_SESSION['ress'])){ echo "<span class='glyphicon glyphicon-remove'></span>"."&nbsp;&nbsp;".$_SESSION['ress'];}?></h4></div>
                 <br> <div class="col-lg-12"><h3>Enter Today Log Entry:</h3></div><br><br><br><br>
                 <br>
      
        <div class="col-sm-6">
       <form class="form-horizontal" role="form"  action="include/userlogentry.php" method="post" id="contactForm">
        
        <div control-label><h4>Morning Session:</h4></div><br>

        <div class="form-group">
        <label class="control-label col-sm-3" for="date">Current Date:</label><span>(MM/DD/YYYY)</span>
        <div class="col-sm-6">          
        <input type="date" class="form-control" name="date1" placeholder="Enter Date" value="<?php date_default_timezone_set("Asia/Kolkata"); echo date('Y-m-d'); ?>" readonly>
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="login">Login Time:</label>
        <div class="col-sm-6">          
        <input type="time" class="form-control" name="mintime" placeholder="Enter Login time" 
        
        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $time=date("d/m/Y H:i:s");
        if( date('A', strtotime($time)) == 'PM')
         { echo 'disabled';}
        ?> 

        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $flag= new FlagCheck();
        $d=date('Y-m-d');
        $u=$_SESSION['uname'];
        $fck=$flag->fetchFlag1($d,$u);
        if($fck)
        {
          echo 'disabled'; 
        }
        else
        {
         
        }
        ?>

        >
        </div>
        </div>
      
        <div class="form-group">
        <label class="control-label col-sm-3" for="logout">Logout Time:</label>
        <div class="col-sm-6">          
        <input type="time" class="form-control" name="mouttime" placeholder="Enter Logout time"
        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $time=date("d/m/Y H:i:s");
        if( date('A', strtotime($time)) == 'PM')
         { echo 'disabled';}
        ?>   

        <?php 
         date_default_timezone_set("Asia/Kolkata");
        $flag1= new FlagCheck();
        $d1=date('Y-m-d');
        $u1=$_SESSION['uname'];
        $fck1=$flag1->fetchFlag1($d1,$u1);
        if($fck1)
        {

        }
        else
        {
          echo 'disabled';
        }
        
        ?>

        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $flag2= new FlagCheck();
        $d2=date('Y-m-d');
        $u2=$_SESSION['uname'];
        $fck2=$flag2->fetchFlag2($d2,$u2);
        if($fck2)
        {
          echo 'disabled';
        }
        else
        {
          
        }
        
        ?>

        >
       </div>
        </div>

        <div class="form-group">        
        <div class="col-sm-3 col-sm-offset-4">
        <button type="submit" class="btn btn-default" id="click" name="submitButton" 
        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $time=date("d/m/Y H:i:s");
        if( date('A', strtotime($time)) == 'PM')
          echo 'disabled';
        ?> >
        Submit</button>
        </div>
        </div>  
        <br>

         <div class="form-group">
        <label class="control-label col-sm-7 " >
          <?php 
         date_default_timezone_set("Asia/Kolkata");
        $flag3= new FlagCheck();
        $d3=date('Y-m-d');
        $u3=$_SESSION['uname'];
        $fck3=$flag3->fetchFlag5($d3,$u3);
        if($fck3)
        {
          echo "** Morning session closed **";
        }
        else
        {
          
        }
        
        ?>
        </label>
        </div>
        
        <div class="form-group">
        <div class="col-md-12">
            <div id="messages" class="mess"></div><br>
        </div>
        </div>

    </form>
    
  </div>
   
    <div class="col-sm-5">
       
        <form class="form-horizontal" role="form"  action="include/userlogentry.php" method="post" id="contactForm">
        <div control-label><h4>Afternoon Session:</h4></div><br>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="date">Current Date:</label><span>(MM/DD/YYYY)</span>
        <div class="col-sm-6">          
        <input type="date" class="form-control" name="date2" placeholder="Enter Date" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="login">Login Time:</label>
        <div class="col-sm-6">          
        <input type="time" class="form-control" name="aintime" placeholder="Enter Login time" 
        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $time=date("d/m/Y H:i:s");
        if( date('A', strtotime($time)) == 'AM')
          {echo 'disabled';}
        ?> 

        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $flag4= new FlagCheck();
        $d4=date('Y-m-d');
        $u4=$_SESSION['uname'];
        $fck4=$flag4->fetchFlag3($d4,$u4);
        if($fck4)
        {
          echo "disabled"; 
        }
        else
        {

        }
        ?>
         > 
        </div>
        </div>
      
        <div class="form-group">
        <label class="control-label col-sm-3" for="logout">Logout Time:</label>
        <div class="col-sm-6">          
        <input type="time" class="form-control" name="aouttime" placeholder="Enter Logout time" 
        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $time=date("d/m/Y H:i:s");
        if( date('A', strtotime($time)) == 'AM')
          {echo 'disabled';}
        ?>  

        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $flag5= new FlagCheck();
        $d5=date('Y-m-d');
        $u5=$_SESSION['uname'];
        $fck5=$flag5->fetchFlag3($d5,$u5);
        if($fck5)
        {

        }
        else
        {
          echo 'disabled';
        }
        
        ?>

        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $flag6= new FlagCheck();
        $d6=date('Y-m-d');
        $u6=$_SESSION['uname'];
        $fck6=$flag6->fetchFlag4($d6,$u6);
        if($fck6)
        {
          echo 'disabled';
        }
        else
        {
          
        }
        
        ?>

        >
        </div>
        </div>

        <div class="form-group">        
        <div class="col-sm-3 col-sm-offset-4">
        <button type="submit" class="btn btn-default" id="click" name="submitButton1" 
        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $time=date("d/m/Y H:i:s");
        if( date('A', strtotime($time)) == 'AM')
          echo 'disabled';
        ?> 

        <?php 
        date_default_timezone_set("Asia/Kolkata");
        $flag8= new FlagCheck();
        $d8=date('Y-m-d');
        $u8=$_SESSION['uname'];
        $fck8=$flag8->fetchFlag4($d8,$u8);
        if($fck8)
        {
          echo 'disabled';
        }
        else
        {
          
        }
        
        ?>

        >
        Submit</button>
        </div>
        </div> 
        <br>

         <div class="form-group">
        <label class="control-label col-sm-10 " >
          <?php 
         date_default_timezone_set("Asia/Kolkata");
        $flag7= new FlagCheck();
        $d7=date('Y-m-d');
        $u7=$_SESSION['uname'];
        $fck7=$flag7->fetchFlag4($d7,$u7);
        if($fck7)
        {
          echo "** Afternoon session closed. Visit tomorrow **";
        }
        else
        {
          
        }
        
        ?>
        </label>
        </div>

        <div class="form-group">
        <div class="col-md-12">
            <div id="messages" class="mess"></div><br>
        </div>
        </div> 

        </form>
        </div>
        </div>
        </div>
        </div>
     
  </body>
</html>