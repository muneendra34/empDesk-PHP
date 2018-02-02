<?php
include 'actions.php';
$action=new Actions();

class AddUser
{
    public function add($id,$fname,$email,$username,$password,$repassword)
    {
        global $db;
        $sql= "INSERT INTO user VALUES ('$id','$fname','$email','$username','$password')";
        $res= mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        }
    }
}

class UpdateUser
{
    public function update($fname,$email,$user,$pswd,$u)
    {
        global $db;
        $sql="update user set fullname='$fname',email='$email',username='$user',password='$pswd' where id='$u'";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        }
    }
}

class DeleteUser
{
    public function delete($uid)
    {
        global $db;
        $sql="delete from user where id='$uid' && username<>'admin'";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        }
    }
}

class DeleteAllUsers extends DeleteAllLogs
{
    public function deleteAll()
    {
        global $db;
        $ob=new DeleteAllLogs();
        if($ob->dellogs())
        {
        $sql="delete from user where username<>'admin' && username<>'hr'";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        }
        }
    }
}

class AddUserLog
{
    public function addlog($uname,$dname,$mlginname,$mlgoutname,$alginname,$algoutname)
    {
        global $db;
        $res1=$this->getcol($uname);
        $row=  mysqli_fetch_assoc($res1);
        $id=$row['id'];
        $c=$this->logcheck($uname, $dname);
        $mf=$af=$mof=$aof=1;
        if($c==0)
        {
        $sql="insert into log (username,date,id,m_in_time,m_out_time,a_in_time,a_out_time,m_flag,a_flag,mo_flag,ao_flag) values('$uname','$dname','$id','$mlginname','$mlgoutname','$alginname','$algoutname','$mf','$af','$mof','$aof')";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        }
        }
        else
        {
            return false;
        }
    }
    
    public function getcol($uname)
    {
        global $db;
        $sql="select * from user where username='$uname'";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return $res;
        }
    }

    public function getflagchk($uname,$date)
    {
        global $db;
        $sql="select * from log where username='$uname' AND date='$date'";
        $res=mysqli_query($db->con(),$sql);
         while($row=mysqli_fetch_assoc($res))
        {
        if($row['m_flag']==1)
        {
            return true;
        }
        else
        {
            return false;
        }
      }
    }
     

     public function getflagchk1($uname,$date)
    {
        global $db;
        $sql="select * from log where username='$uname' AND date='$date'";
        $res=mysqli_query($db->con(),$sql);
         while($row=mysqli_fetch_assoc($res))
        {
        if($row['a_flag']==1)
        {
            return true;
        }
        else
        {
            return false;
        }
      }
    }

    public function logcheck($uname,$date)
    {
        global $db;$chk=0;
        $sql="select date from log where username='$uname'";
        $res=  mysqli_query($db->con(), $sql);
        while($row=mysqli_fetch_assoc($res))
        {
            if($date==$row['date'])
            {
                $chk++;
            }
        }
        return $chk;
    }
}

class EditUserLog
{
    public function editlog($uname,$dname,$minname,$moutname,$ainname,$aoutname,$uus,$udd)
    {
        global $db;
        $sql="update log set username='$uname',date='$dname',m_in_time='$minname',m_out_time='$moutname',a_in_time='$ainname',a_out_time='$aoutname' where username='$uus' && date='$udd'";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        }
    }
}

class DeleteAllLogs
{
    public function dellogs()
    {
        global $db;
        $sql="delete from log";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        }
    }
}


 class DetailsForLog
 {
    public function fetchDetails($user)
    {
     global $db;
        $sql="select * from user where username='$user'";
        $res=mysqli_query($db->con(),$sql);
        while($row=mysqli_fetch_assoc($res))
        {
        if($user==$row['username'])
        {
            $_SESSION['minefulln']=$row['fullname'];
            $_SESSION['mineemail']=$row['email'];
        }  
      } 
    }
 }

class UserAddLog extends AddUserLog
{
    public function uaddlog($uname,$dname,$lginname)
    {
        global $db;
        $ob=new AddUserLog();
        $res1=$ob->getcol($uname);
        $row= mysqli_fetch_assoc($res1);
        $id=$row['id'];
        $c=$ob->logcheck($uname,$dname);
        $ff=1;
        
        $fckk=$ob->getflagchk1($uname,$dname);
        if($fckk)
        {
            $sql="update log set m_in_time='$lginname',m_flag='$ff'";
            $res=mysqli_query($db->con(),$sql);
            if($res)
            {
                return true;
            
            }
            else
            {
                return false;
            }
        }
        else
        {
            if($c==0)
             {
            $sql="insert into log (username,date,id,m_in_time,m_flag) values('$uname','$dname','$id','$lginname',$ff)";
            $res=mysqli_query($db->con(),$sql);
            if($res)
            {
                return true;
            
            }
            else
            {
                return false;
            }
            }
            else
            {
                return false;
            }
         }
        
        
    }
   

    public function uaddlog1($uname,$dname,$lgoutname)
    {
        global $db;
        $ob=new AddUserLog();
        $res1=$ob->getcol($uname);
        $row= mysqli_fetch_assoc($res1);
        $id=$row['id'];
        //$c=$ob->logcheck($uname,$dname);
        //if($c==0)
        //{
        $fc=1;
        $sql="update log set m_out_time='$lgoutname',mo_flag='$fc'";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        
        }
        else
        {
            return false;
        }
        //}
        //else
        //{
          //  return false;
        //}
        
    }


    public function uaddlog2($uname,$dname,$lgoutname)
    {
        global $db;
        $ob=new AddUserLog();
        $res1=$ob->getcol($uname);
        $row= mysqli_fetch_assoc($res1);
        $id=$row['id'];
        $f=1;
        //$c=$ob->logcheck($uname,$dname);
        //if($c==0)
        //{
        $sql="update log set a_out_time='$lgoutname', ao_flag='$f'";
        $res=mysqli_query($db->con(),$sql);
        if($res)
        {
            return true;
        
        }
        else
        {
            return false;
        }
        //}
        //else
        //{
          //  return false;
        //}
        
    }
   
    
        public function uaddlog3($uname,$dname,$lginname)
    {
        global $db;
        $ob=new AddUserLog();
        $res1=$ob->getcol($uname);
        $row= mysqli_fetch_assoc($res1);
        $id=$row['id'];
       // $c=$ob->logcheck($uname,$dname);
        $flag=1;
       // if($c==0)
        //{
        $usr=$uname;$dd=$dname;
        $fck=$ob->getflagchk($usr,$dd);
        if($fck)
        {
             $sql="update log set a_in_time='$lginname',a_flag='$flag'"; 
             $res=mysqli_query($db->con(),$sql);
                   if($res)
                {
                    return true;
                
                } 
                else
                {
                    return false;
                }
           
        }
        else
        {   if($c==0)
            {
            $sql="insert into log (username,date,id,a_in_time,a_flag) values('$uname','$dname','$id','$lginname',$flag)";
             $res=mysqli_query($db->con(),$sql);
                   if($res)
                {
                    return true;
                
                } 
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
            }
        
       
       
        
        //}
       // else
       // {
         //   return false;
        //}
    }   

}

class CPassword
{
    public function cp($user,$currentpassword,$newpassword)
    {
        global $db;
        $rr=$this->pswdchk($user, $currentpassword);
        if($rr)
        {
        $sql= "update user set password='$newpassword' where username='$user'";
        $res= mysqli_query($db->con(), $sql);
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
        }
        else
        {
            return false;
        }
    }
    
    public function pswdchk($user,$password)
    {
        global $db;
        $sql1="select * from user where username='$user' and password='$password'";
        $res1=  mysqli_query($db->con(), $sql1);
        $row=  mysqli_num_rows($res1);
        if($row==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


class FlagCheck
{
    public function fetchFlag1($datetime,$user)
    {
        global $db;
        $sql1="select * from log where date='$datetime' AND username='$user'";
        $res1= mysqli_query($db->con(),$sql1);
        while($row=mysqli_fetch_assoc($res1))
        {
        
         if($row['m_flag']== 1 )
        
        {
            return true;
            
        }
        else
        {
            return false;
            
        }

        }
    }

    public function fetchFlag2($datetime,$user)
    {
        global $db;
        $sql3="select * from log where date='$datetime' AND username='$user'";
        $res3= mysqli_query($db->con(),$sql3);
        while($row=mysqli_fetch_assoc($res3))
        {
       
         if($row['mo_flag']== 1 )
        
        {
            return true;
            
        }
        else
        {
            return false;
            
        }        
    }
}

    public function fetchFlag3($datetime,$user)
    {
        global $db;
        $sql2="select * from log where date='$datetime' AND username='$user'";
        $res2= mysqli_query($db->con(),$sql2);
        while($row=mysqli_fetch_assoc($res2))
        {
       
         if($row['a_flag']== 1 )
        
        {
            return true;
            
        }
        else
        {
            return false;
            
        }        
    }
}



public function fetchFlag4($datetime,$user)
    {
        global $db;
        $sql4="select * from log where date='$datetime' AND username='$user'";
        $res4= mysqli_query($db->con(),$sql4);
        while($row=mysqli_fetch_assoc($res4))
        {
       
         if($row['ao_flag']== 1 )
        
        {
            return true;
            
        }
        else
        {
            return false;
            
        }        

    }
}


    public function fetchFlag5($datetime,$user)
    {
        global $db;
        $sql11="select * from log where date='$datetime' AND username='$user'";
        $res11= mysqli_query($db->con(),$sql11);
        while($row=mysqli_fetch_assoc($res11))
        {
       
         if($row['mo_flag']== 1 )
        
        {
            return true;
            
        }
        else
        {
            return false;
            
        }        

    }
}


}


class DefaultTimeValues
{

    public function getTime($user)
    {
        global $db;
        date_default_timezone_set("Asia/Kolkata");
        $dadt=date('Y-m-d');
        $us='$user';
        $sql7="select * from log where username='$us' AND date='$dadt'";
        $res7= mysqli_query($db->con(),$sql7);
        while($row=mysqli_fetch_assoc($res7))
        {   
            $_SESSION['ussvar']=$row['username'];
            $_SESSION['umint']=$row['m_in_time'];
            $_SESSION['umoutt']=$row['m_out_time'];
            $_SESSION['uaint']=$row['a_in_time'];
            $_SESSION['uaoutt']=$row['a_out_time'];
        }
    }

}



?>