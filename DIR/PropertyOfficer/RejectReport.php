<?php

    include('../Connection/db.php');

    $rodid = $_POST['_rodid'];
    $rodstatus = $_POST['_finaleval'];
    $rodremarks = $_POST['_remakrsofreport'];
    $currdate = date('Y-m-d');
    
    $query = mysqli_query($connection,"UPDATE ams_t_report_of_damage SET ROD_STATUS = '$rodstatus', ROD_REMARKS = '$rodremarks' WHERE ROD_ID = $rodid");            

    echo "UPDATE ams_t_report_of_damage SET ROD_STATUS = '$rodstatus', ROD_REMARKS = '$rodremarks' WHERE ROD_ID = $rodid";

    $query2 = mysqli_query($connection,"UPDATE ams_t_report_of_damage_sub SET RODS_STATUS = '$rodstatus', RODS_DATE_INSPECT = '$currdate', RODS_EVALUATION = 'Reject' WHERE ROD_ID = $rodid");            

    echo "UPDATE ams_t_report_of_damage_sub SET RODS_STATUS = '$rodstatus', RODS_DATE_INSPECT = '$currdate' WHERE ROD_ID = $rodid";

?>