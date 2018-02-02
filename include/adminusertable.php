<?php 
//session_start();
include_once 'dbConnect.php';
$db=new dbConnect();
$sql="select * from user";
$result=  mysqli_query($db->con(), $sql);


?>

<div class="box-body">
                   <table id="myTable" class="display" >
                        <thead>
                        <th><input type="checkbox" name="select_all" id="select_all"  value=""/>&nbsp;Select All</th>
                               <th>Id</th>    
                               <th>Full Name</th>
                               <th>Email</th>
                               <th>User Name</th>
                               <th>View</th>
                               <th>Edit</th>
                               <th>Delete</th>
                       </thead>
                       
                        <tbody>
                                <?php
                                  while($row=  mysqli_fetch_assoc($result))
                                      {
                                  ?>  
              
                                 <tr>
                                     <td align="center"><input name='selector[]' type="checkbox"  class="checkbox" value="<?=$row['id'] ?>"/></td>
                                      <td><?=$row['id']?></td> 
                                      <td><?=$row['fullname']?></td>
                                      <td><?=$row['email']?></td>
                                      <td><?=$row['username']?></td>

                                      

                                      <td>  <div class="btn-group">
                                                <a href="include/logdetails.php?username=<?=$row['username']?>">
                                                <button type="button" class="btn btn-default">View Logs</button>
                                                </a>
                                            </div>
                                      </td>

                                      
                                      <td>  <div class="btn-group">
                                                <a href="include/adminedit.php?id=<?=$row['id']?>">
                                                <button type="button" class="btn btn-warning">Edit</button>
                                                </a>
                                            </div>
                                      </td>
                                      
                                       <td>  <div class="btn-group">
                                                <a href="include/delete.php?id=<?=$row['id']?>&username=<?=$row['username']?>"> 
                                                <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                             </div>
                                       </td>
                                </tr>
                            <?php
                                 }
                              ?> 
                    </tbody>
                    
                 </table>
            </div>


