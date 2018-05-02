<?php

    include('../Connection/db.php');

    $id = $_POST['_id'];

    $query1 = mysqli_query($connection, "SELECT * FROM ams_t_user_request_summary AS URS INNER JOIN ams_t_user_request AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN ams_r_employee_profile AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE URS.URS_NO = '$id' AND URS.URS_STATUS_TO_PO = 'Pending'");

    $officename = 'NO DATA';

    while($rowx = mysqli_fetch_assoc($query1))
    {
    	$officename = $rowx['O_NAME'];
    }

    echo $officename;

?>