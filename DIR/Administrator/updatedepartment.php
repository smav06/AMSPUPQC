<?php
	
	include('db.php');

 	if (isset($_POST['_deptCode']) && isset($_POST['_deptName']) && isset($_POST['_campusCode']) && isset($_POST['_uniqueId'])) 
 	{
		$updeptCode = $_POST['_deptCode'];
        $updeptName = $_POST['_deptName'];
        $upcampusCode = $_POST['_campusCode'];
        $uniqueId = $_POST['_uniqueId'];


   		$upquery = "UPDATE ams_r_office SET O_CODE = '$updeptCode', O_NAME = '$updeptName', C_ID = $upcampusCode WHERE O_ID = $uniqueId";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


