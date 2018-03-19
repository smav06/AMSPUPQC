<?php

    include('../Connection/db.php');

    $urid = $_POST['_urid'];
    $qty = $_POST['_aqty'];
    $ursid = $_POST['_ursid'];

    $curredate = date('Y-m-d');

    $query = mysqli_query($connection,"INSERT INTO `ams_t_user_request_approved_by_po` (URA_QUANTITY, UR_ID, URS_ID) VALUES ($qty, $urid, $ursid)");            

    $query2 = mysqli_query($connection,"UPDATE `ams_t_user_request` SET UR_STATUS = 'Approved', UR_APPROVED_DATE_BY_PO = '$curredate' WHERE UR_ID = $urid");

    echo "INSERT INTO `ams_t_user_request_approved_by_po` (URA_QUANTITY, UR_ID, URS_ID) VALUES ($qty, $urid, $ursid)";

    echo "UPDATE `ams_t_user_request` SET UR_STATUS = 'Approved', UR_APPROVED_DATE_BY_PO = '$curredate' WHERE UR_ID = $urid";

?>
