<?php
	
	include('db.php');

 	if (isset($_POST['_dlCode']) && isset($_POST['_dlName'])) 
 	{
		$inDlCode  = $_POST['_dlCode'];
		$inDlName  = $_POST['_dlName'];

   		$inQuery = "INSERT INTO ams_r_disposal_location (DL_ID, DL_CODE, DL_DESC) VALUES (NULL, '$inDlCode', '$inDlName')";
                                        
        mysqli_query($connection, $inQuery);
 	}

?>


