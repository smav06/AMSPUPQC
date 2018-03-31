<?php
	
	include('db.php');

 	if (isset($_POST['_upUnit']) && isset($_POST['_uniqueId'])) 
 	{
		$upUnit = $_POST['_upUnit'];
        $uniqueId = $_POST['_uniqueId'];


   		$upquery = "UPDATE ams_r_asset_unit SET UNT_NAME = '$upUnit' WHERE UNT_ID = $uniqueId";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


