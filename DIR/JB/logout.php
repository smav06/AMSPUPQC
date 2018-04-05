<?php

	session_start();

	include('db.php');

	$myid = $_SESSION['myid'];

    $inQuery = "INSERT INTO ams_r_users_log (UL_LOGGED_DATE, UL_LOGGED_TYPE, EP_ID) VALUES (CURRENT_TIMESTAMP, 'logged out', $myid)";

    mysqli_query($connection, $inQuery);

	echo "<script>window.location.assign('login.php')</script>";
	session_destroy();
?> 