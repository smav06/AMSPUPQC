<?php
	
	include('db.php');

 	if (isset($_POST['_campuscode']) && isset($_POST['_campusname'])) 
 	{
		$incampuscode = $_POST['_campuscode'];
        $incampusname = $_POST['_campusname'];


   		$upquery = "INSERT INTO `ams_r_campus` (`C_ID`, `C_CODE`, `C_NAME`) VALUES (NULL, '$incampuscode', '$incampusname')";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


