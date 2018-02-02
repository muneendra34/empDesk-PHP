<?php
include 'adduserlog.php';
$actions=new Actions();
$fet=new DetailsForLog();
if($actions->get_session()== false)
{
    header('location: ../login.php');
}
$ud="";
if(isset($_GET['username']))
{
 
  $ud=$_SESSION['mineu']=$_GET['username'];
  $ress=$fet->fetchDetails($ud);
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
    
 
 
    <script type="text/javascript" src="../scripts/js/addlog.js"></script>
  
 
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
     <link rel="stylesheet" href="../bootstrap/css/bootstrapValidator.min.css">
    <script src="../bootstrap/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}
</style>

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
                  <span class="hidden-xs"><?php echo ucfirst($_SESSION['fname']);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      <img src="../dist/img/profile.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo ucfirst($_SESSION['fname']);?> - Web Developer
                     
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
                <p><?php echo ucfirst($_SESSION['fname']);?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><center><h4>Admin Panel Controls</h4></center></li>
          <li><a href="../admin.php"><?php if(!isset($_SESSION['lc'])){$_SESSION['lc']='';} if($_SESSION['lc']==0) {unset($_SESSION['ress']);}else{$_SESSION['lc']=0;}?><i class="glyphicon glyphicon-home"></i>
           &nbsp;<span>Home</span>
         <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a></li>
          <li><a href="deleteallusers.php"><i class="glyphicon glyphicon-user"></i>&nbsp;<span>Delete All Users</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a></li>
          <li><a href="userslogs.php"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<span>View Users Logs</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a></li>
          <li><a href="dlogs.php"><i class="glyphicon glyphicon-align-justify"></i>&nbsp;<span>Delete All Logs</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a></li>
          <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>&nbsp;<span>Logout</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a></li> </ul>   
        </section>
        <!-- /.sidebar -->
      </aside>

     

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"><br>
    
   

    <div class="col-md-4" style="word-wrap:break-word";>
  <div class="panel panel-default ">
    <div class="panel-heading"><b>Employee Details</b></div>
    <div class="panel-body">
      Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
      &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['minefulln']; ?><br>
      Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
      <?php echo $_SESSION['mineu']; ?><br>
      email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['mineemail']; ?>
    </div>  
  </div>
</div>




    <div class="col-md-8" style="word-wrap:break-word";>
  <div class="panel panel-default ">
    <div class="panel-heading"><b>Employee Log Details</b></div>
    <div class="panel-body">


<div class="container">
  <form action="logfetch.php" id="fetchform" name="fetchf" method="post">
    <div class="form-group col-sm-2">
      <label for="date">Choose Date:</label>
      <input type="date" class="form-control" id="date1" name="date" ></div><br>
    <button type="submit" class="btn btn-primary" name="submitButton">Submit</button>
  </form>

<form action="logfetch.php" id="fetchform" name="fetchf" method="post">
    <button type="submit" class="btn btn-primary" name="submitButton1">Show all Logs</button>  
  </form>
  
</div>

<?php 
$dat='';

 if(isset($_POST['submitButton']))
     {
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {  
            $dat=$_POST['date'];
          }

$uss=$_SESSION['mineu'];

$db=new dbConnect();
$sql="select * from log where username='$uss' AND date='$dat'";
$result=mysqli_query($db->con(), $sql);


}
elseif (isset($_POST['submitButton1'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {

  }
  $uss=$_SESSION['mineu'];

$db=new dbConnect();
$sql="select * from log where username='$uss'";
$result=mysqli_query($db->con(), $sql);
}

?>

  <table id="t01">
  <tr>
    <th>Date</th>
    <th>Moring In-time</th>
    <th>Afternoo Out-time</th> 
    <th>Afternoon In-time</th>
    <th>Evening Out-time</th>
  </tr>

      <?php while($row= mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['m_in_time']."</td>";
        echo "<td>".$row['m_out_time']."</td>";
        echo "<td>".$row['a_in_time']."</td>";
        echo "<td>".$row['a_out_time']."</td>";
        echo "</tr>";
      }
      ?> 



  
</table>







    </div>
  </div>
</div>

   

   </div>
    </div><!-- ./wrapper -->
  </body>
</html>