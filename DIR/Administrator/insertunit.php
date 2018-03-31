<?php
	
	include('db.php');

 	if (isset($_POST['_unit'])) 
 	{
		$inUnit = $_POST['_unit'];

   		$inQuery = "INSERT INTO `ams_r_asset_unit` (`UNT_ID`, `UNT_NAME`) VALUES (NULL, '$inUnit')";
                                        
        mysqli_query($connection, $inQuery);
 	}

?>


