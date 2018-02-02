<?php
include_once 'dbConnect.php';
$db=new dbConnect();
$sql="select * from log";
$result=  mysqli_query($db->con(), $sql);
?>

 <div class="box-body">
          <table id="myTable" class="display" >
                  <thead>
                  <th><input type="checkbox" name="select_all" id="select_all"  value=""/>&nbsp;Select All</th>
                  <th>Username</th>
                  <th>Date</th>
                  <th>Morning In_time</th>
                  <th>Afternoon Out_time</th>
                  <th>Afternoon In_time</th>
                  <th>Afternoon Out_time</th>
                  <th>ID</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  
              </thead>
              <tbody>
                  <?php
                  while($row=  mysqli_fetch_assoc($result))
                  {
                    ?>  
              <tr>
                  <td align="center"><input name='selector[]' type="checkbox"  class="checkbox" value="<?=$row['l_id'] ?>"/></td>
                      
                      <td><?=$row['username']?></td>
                      <td><?=$row['date']?></td>
                      <td><?=$row['m_in_time']?></td>
                      <td><?=$row['m_out_time']?></td>
                      <td><?=$row['a_in_time']?></td>
                      <td><?=$row['a_out_time']?></td>
                      <td><?=$row['id']?></td>
                      <td><div class="btn-group">
                              <a href="adminlogedit.php?username=<?=$row['username']?>&date=<?=$row['date']?>">
                                  <button type="button" name="edit" class="btn btn-warning">Edit
                                      </button></a>
                          </div></td>
                      <td><div class="btn-group">
                                  <a href="adminlogdelete.php?username=<?=$row['username']?>&date=<?=$row['date']?>"> 
                                      <button type="button"     class="btn btn-danger" >Delete</button></a>
                              </div></td>
                    
              </tr>
                  <?php
                      }
                  ?> 
              
              </tbody>
          </table></div>