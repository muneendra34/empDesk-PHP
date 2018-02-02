<?php
include_once 'dbConnect.php';
$db=new dbConnect();
$uu=$_SESSION['uname'];
$sql="select * from log where username='$uu'";
$result=  mysqli_query($db->con(), $sql);
?>

<div class="box-body">
          <table id="myTable" class="display" >
                  <thead>
                 
                  <th>Date</th>
                  <th>Morning In_time</th>
                  <th>Afternoon Out_time</th>
                  <th>Afternoon In_time</th>
                  <th>Evening Out_time</th>
                  
              </thead>
              <tbody>
                  <?php
                  while($row=  mysqli_fetch_assoc($result))
                  {
                    ?>  
              <tr>
                      
                      <td><?=$row['date']?></td>
                      <td><?=$row['m_in_time']?></td>
                      <td><?=$row['m_out_time']?></td>
                      <td><?=$row['a_in_time']?></td>
                      <td><?=$row['a_out_time']?></td>
                      
                    
              </tr>
                  <?php
                      }
                  ?> 
              </tbody>
          </table></div>

