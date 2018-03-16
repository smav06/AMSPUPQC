<?php
	
	include('db.php');

 	if (isset($_POST['_campuscode']) && isset($_POST['_campusname']) && isset($_POST['_id'])) 
 	{
		$upcampuscode = $_POST['_campuscode'];
        $upcampusname = $_POST['_campusname'];
        $uniqueid = $_POST['_id'];


   		$upquery = "UPDATE ams_r_campus SET C_CODE = '$upcampuscode', C_NAME = '$upcampusname' WHERE C_ID = $uniqueid";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


