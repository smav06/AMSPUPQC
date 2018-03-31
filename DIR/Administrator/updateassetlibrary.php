<?php
	
	include('db.php');

 	if (isset($_POST['_assName']) && isset($_POST['_assUnit']) && isset($_POST['_aCat']) && isset($_POST['_uniqueId'])) 
 	{
		$upAssName = $_POST['_assName'];
		$upAUnit = $_POST['_assUnit'];
        $upACat = $_POST['_aCat'];
        $uniqueId = $_POST['_uniqueId'];


   		$upquery = "UPDATE ams_r_asset_library SET AL_NAME = '$upAssName', UNT_ID = '$upAUnit', AC_ID = '$upACat' WHERE AL_ID = $uniqueId";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


