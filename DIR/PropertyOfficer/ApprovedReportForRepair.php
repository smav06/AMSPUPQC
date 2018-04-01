<?php

    include('../Connection/db.php');

    $rodsid = $_POST['_rodsid'];
    $aid = $_POST['_aid'];
    $rodstatus = $_POST['_finaleval'];
    $currdate = date('Y-m-d');
    
    $query = mysqli_query($connection,"UPDATE ams_t_report_of_damage_sub SET RODS_DATE_INSPECT = '$currdate', RODS_STATUS = '$rodstatus', RODS_EVALUATION = 'For Repair' WHERE RODS_ID = $rodsid");            

    echo "UPDATE ams_t_report_of_damage_sub SET RODS_DATE_INSPECT = '$currdate', RODS_STATUS = '$rodstatus', RODS_EVALUATION = 'For Repair' WHERE RODS_ID = $rodsid";

    $query2 = mysqli_query($connection,"UPDATE ams_r_asset SET A_STATUS = 'For Repair' WHERE A_ID = $aid");

    echo "UPDATE ams_r_asset SET A_STATUS = 'For Repair' WHERE A_ID = $aid";
?>