<?php
	
	include('db.php');

 	if (isset($_POST['_cat'])) 
 	{
		$inCat = $_POST['_cat'];

   		$inQuery = "INSERT INTO `ams_r_asset_category` (`AC_ID`, `AC_NAME`) VALUES (NULL, '$inCat')";
                                        
        mysqli_query($connection, $inQuery);
 	}

?>


