<?php
	
	include('db.php');

    $id = $_GET['_id'];
    $oid = $_GET['_oid'];

    $querys = mysqli_query($connection, "SELECT AL.AL_NAME, UR.UR_UNIT, UR.UR_QUANTITY FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID INNER JOIN `ams_r_asset_library` AS AL ON UR.AL_ID = AL.AL_ID WHERE EP.O_ID = $oid AND URS.URS_ID = $id ORDER BY URS.URS_REQUEST_DATE DESC, URS.URS_ID DESC");

    while($row = mysqli_fetch_assoc($querys))
    {
        $alname = $row["AL_NAME"];
        $urunit = $row['UR_UNIT'];
        $urqty = $row['UR_QUANTITY'];
    }

    echo json_encode(
          array("alname" => $alname,
                "urunit" => $urunit,
                "urqty" => $urqty)
     );

?>
