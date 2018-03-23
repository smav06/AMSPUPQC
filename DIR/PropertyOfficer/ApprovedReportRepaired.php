<?php

    include('../Connection/db.php');

    $rodsid = $_POST['_rodsid'];
    $rodstatus = $_POST['_finaleval'];
    $currdate = date('Y-m-d');
    
    $query = mysqli_query($connection,"UPDATE ams_t_report_of_damage_sub SET RODS_DATE_INSPECT = '$currdate', RODS_STATUS = '$rodstatus', RODS_EVALUATION = 'Repaired' WHERE RODS_ID = $rodsid");            

    echo "UPDATE ams_t_report_of_damage_sub SET RODS_DATE_INSPECT = '$currdate', RODS_STATUS = '$rodstatus', RODS_EVALUATION = 'Repaired' WHERE RODS_ID = $rodsid";

?>