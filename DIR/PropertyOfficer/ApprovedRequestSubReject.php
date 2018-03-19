<?php

    include('../Connection/db.php');

    $urid = $_POST['_uridx'];
    $qty = $_POST['_aqtyx'];
    $ursid = $_POST['_ursidx'];

    $curredate = date('Y-m-d');

    $query2 = mysqli_query($connection,"UPDATE `ams_t_user_request` SET UR_STATUS = 'Reject', UR_REJECT_DATE_BY_PO = '$curredate' WHERE UR_ID = $urid");

    echo "UPDATE `ams_t_user_request` SET UR_STATUS = 'Reject', UR_REJECT_DATE_BY_PO = '$curredate' WHERE UR_ID = $urid";

?>
