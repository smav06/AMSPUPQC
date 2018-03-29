<?php
	
	include('db.php');

 	if (isset($_POST['_assetname'])) 
 	{
		$inassetname = $_POST['_assetname'];

   		$upquery = "INSERT INTO ams_r_asset_library (AL_ID, AL_NAME) VALUES (NULL, '$inassetname')";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


