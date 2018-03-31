<?php
	
	include('db.php');

 	if (isset($_POST['_upCat']) && isset($_POST['_uniqueId'])) 
 	{
		$upCat = $_POST['_upCat'];
        $uniqueId = $_POST['_uniqueId'];


   		$upquery = "UPDATE ams_r_asset_category SET AC_NAME = '$upCat' WHERE AC_ID = $uniqueId";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


