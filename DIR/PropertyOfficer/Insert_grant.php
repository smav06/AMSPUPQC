<?php

    include('../Connection/db.php');

    $aid = $_POST['_aid'];
    $epid = $_POST['_epid'];

    $query = mysqli_query($connection,"INSERT INTO `ams_t_par_sub` (A_ID, PAR_ID, EP_ID) VALUES ($aid, (SELECT max(PAR_ID) FROM `ams_t_par`), $epid)");            

    $query2 = mysqli_query($connection,"UPDATE `ams_r_asset` SET A_AVAILABILITY = 'Assigned' WHERE A_ID = $aid");

    echo "INSERT INTO `ams_t_par_sub` (A_ID, PAR_ID, EP_ID) VALUES ($aid, (SELECT max(PAR_ID) FROM `ams_t_par`), $epid)";

    echo "<br><br>";

    echo "UPDATE `ams_r_asset` SET A_AVAILABILITY = 'Assigned' WHERE A_ID = $aid";

?>
