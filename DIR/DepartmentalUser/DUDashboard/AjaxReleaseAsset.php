<?php
	
	include('db.php');

	if(isset($_POST['_astid']) )
	{
        $empid = $_POST['_empid'];
        $astid = $_POST['_astid'];
		$reason = $_POST['_reason'];
		$date = $_POST['_today'];

		//record ng release
        $insrelease = mysqli_query($connection, "INSERT INTO ams_t_report_for_availability_of_asset(RFAOA_REASON, RFAOA_DATE, EP_ID, A_ID) VALUES ('$reason', '$date', $empid, $astid)");

        //cancel nya par
        $updatepar = mysqli_query($connection, "UPDATE ams_t_par SET PAR_CANCEL = 1, PAR_CANCEL_DATE = '$date' WHERE A_ID = $astid AND EP_ID = $empid AND PAR_CANCEL = 0");        

        //set nya available yung asset
        $updateast = mysqli_query($connection, "UPDATE ams_r_asset SET A_AVAILABILITY = 'Available' WHERE A_ID = $astid ");

	}

?>
