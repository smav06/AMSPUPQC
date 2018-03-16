<?php
	
	include('db.php');

	if(isset($_POST['_id']) )
	{
        $id = $_POST['_id'];
        $date = date('Y-m-d');
       
        $insrelease = mysqli_query($connection, "UPDATE `ams_t_report_of_damage_sub` SET RODS_CANCEL_DATE = '$date', RODS_SHOW = 1 WHERE RODS_ID = $id");

        $updateall = mysqli_query($connection, "UPDATE `ams_t_report_of_damage_sub` AS RODS INNER JOIN `ams_t_report_of_damage` AS ROD ON RODS.ROD_ID = ROD.ROD_ID SET RODS.RODS_SHOW = 0 WHERE RODS.RODS_ID = $id AND ROD.ROD_DATE IS NOT NULL AND RODS.RODS_CANCEL_DATE IS NOT NULL");
        
	}

?>
