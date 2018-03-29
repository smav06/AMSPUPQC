<?php
	
	include('db.php');

 	if (isset($_POST['_dlocation'])) 
 	{
		$indlocation = $_POST['_dlocation'];

   		$upquery = "INSERT INTO ams_r_disposal_location (DL_ID, DL_NAME) VALUES (NULL, '$indlocation')";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


