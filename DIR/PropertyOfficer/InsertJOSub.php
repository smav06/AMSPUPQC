<?php

    include('../Connection/db.php');

    $aid = $_POST['_aid'];

    $query = mysqli_query($connection,"INSERT INTO `ams_t_job_order_sub` (A_ID, JO_ID) 
                                    VALUES ($aid, (SELECT MAX(JO_ID) FROM `ams_t_job_order`) )");

    $query2 = mysqli_query($connection,"UPDATE ams_r_asset SET A_STATUS = 'On Job Order' WHERE A_ID = $aid");

    echo "INSERT INTO `ams_t_job_order_sub` (A_ID, JO_ID) 
                                    VALUES ($aid, (SELECT MAX(JO_ID) FROM `ams_t_job_order`) )";

    echo "UPDATE ams_r_asset SET A_STATUS = 'On Job Order' WHERE A_ID = $aid";

?>
