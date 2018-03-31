<?php
	
	include('db.php');

 	if (isset($_POST['_upDlCode']) && isset($_POST['_upDlDesc']) && isset($_POST['_uniqueId'])) 
 	{
		$upDlCode = $_POST['_upDlCode'];
        $upDlDesc = $_POST['_upDlDesc'];
        $uniqueId = $_POST['_uniqueId'];


   		$upquery = "UPDATE ams_r_disposal_location SET DL_CODE = '$upDlCode', DL_DESC = '$upDlDesc' WHERE DL_ID = $uniqueId";
                                        
        mysqli_query($connection, $upquery);
 	}

?>


