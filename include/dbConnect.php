<?php

class dbConnect {
	
	public function con() 
        {
            require_once 'config.php';
		$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
               
                if (!$conn) 
                    {
                       die('Cannot connect to database');
                    }
                    
                    return $conn;     
        }
        public function close()
        {
            mysqli_close($conn);
        }
                    }
                        
?>