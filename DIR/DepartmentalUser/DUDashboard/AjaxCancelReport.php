<?php
	
	include('db.php');

	if(isset($_POST['_id']) )
	{
        $id = $_POST['_id'];
        $date = date('Y-m-d');
       
        $insrelease = mysqli_query($connection, "UPDATE ams_t_maintenance_report_of_damage SET ROD_CANCEL_DATE = '$date', ROD_SHOW = 1 WHERE ROD_NO = $id");

        $updateall = mysqli_query($connection, "UPDATE ams_t_maintenance_report_of_damage SET ROD_SHOW = 0 WHERE ROD_NO = $id AND ROD_DATE IS NOT NULL AND ROD_CANCEL_DATE IS NOT NULL");
        
	}

?>
