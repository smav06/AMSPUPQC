<?php

    include('../Connection/db.php');

    $ddate = $_POST['_ddate'];
    $disptype = $_POST['_origdtype'];
    $remarks = $_POST['_dremarks'];
    $dispby = $_POST['_ddisposedby'];
    $dlid = $_POST['_origddlid'];
    $aid = $_POST['_daid'];

    $query = mysqli_query($connection,"INSERT INTO `ams_t_dispose` (D_DATE, D_TYPE, D_REMARKS, D_DISPOSED_BY, DL_ID, A_ID) VALUES ('$ddate', '$disptype', '$remarks', '$dispby', $dlid, $aid)");            

    echo "INSERT INTO `ams_t_dispose` (D_DATE, D_TYPE, D_REMARKS, D_DISPOSED_BY, DL_ID, A_ID) VALUES ('$ddate', '$disptype', '$remarks', '$dispby', $dlid, $aid)";


    $query2 = mysqli_query($connection,"UPDATE `ams_r_asset` SET A_STATUS = 'Disposed', A_DISPOSAL_STATUS = 1 WHERE A_ID = $aid");

    echo "UPDATE `ams_r_asset` SET A_STATUS = 'Disposed', A_DISPOSAL_STATUS = 1 WHERE A_ID = $aid";

?>
