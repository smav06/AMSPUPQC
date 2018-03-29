<?php
	
	include('db.php');

 	if (isset($_POST['_deptcode']) && isset($_POST['_deptname']) && isset($_POST['_campuscode'])) 
 	{
 		$indeptcode = $_POST['_deptcode'];
		$indeptname = $_POST['_deptname'];
        $incampuscode = $_POST['_campuscode'];


   		$upquery = "INSERT INTO ams_r_office (O_ID, O_CODE, O_NAME, C_ID) VALUES (NULL, '$indeptcode', '$indeptname', '$incampuscode')";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


