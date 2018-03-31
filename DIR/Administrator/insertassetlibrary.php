<?php
	
	include('db.php');

 	if (isset($_POST['_assetname']) && isset($_POST['_assetCat']) && isset($_POST['_assetUnit'])) 
 	{
		$inassetname = $_POST['_assetname'];
		$inAssetCat = $_POST['_assetCat'];
		$inAssetUnit = $_POST['_assetUnit'];

   		$upquery = "INSERT INTO ams_r_asset_library (AL_ID, AL_NAME, UNT_ID, AC_ID) VALUES (NULL, '$inassetname', $inAssetUnit, $inAssetCat)";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


