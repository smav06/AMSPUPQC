<?php

    include('../Connection/db.php');

    $aid = $_POST['_aid'];

    $insrelease = mysqli_query($connection, "UPDATE `ams_t_report_of_damage_sub` SET RODS_SHOW = 1 WHERE A_ID = $aid");

    $insrelease2 = mysqli_query($connection, "INSERT INTO `ams_t_report_of_damage_sub` (ROD_ID, A_ID) VALUES ((SELECT MAX(ROD_ID) FROM `ams_t_report_of_damage`), $aid)");

    echo "UPDATE `ams_t_report_of_damage_sub` SET RODS_SHOW = 1 WHERE A_ID = $aid";

    echo "INSERT INTO `ams_t_report_of_damage_sub` (ROD_ID, A_ID) VALUES ((SELECT MAX(ROD_ID) FROM `ams_t_report_of_damage`), $aid)";

?>
