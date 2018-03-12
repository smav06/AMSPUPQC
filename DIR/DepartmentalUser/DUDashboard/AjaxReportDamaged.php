<?php
	
	include('db.php');

	if(isset($_POST['_astid']) )
	{
        $empid = $_POST['_empid'];
        $astid = $_POST['_astid'];
		$report = $_POST['_report'];
		$date = $_POST['_today'];

		$insrelease = mysqli_query($connection, "UPDATE ams_t_maintenance_report_of_damage SET ROD_SHOW = 1 WHERE A_ID = $astid");

        $insrelease = mysqli_query($connection, "INSERT INTO ams_t_maintenance_report_of_damage (ROD_REASON, ROD_DATE, EP_ID, A_ID) VALUES ('$report', '$date', $empid, $astid)");
        
	}

?>
