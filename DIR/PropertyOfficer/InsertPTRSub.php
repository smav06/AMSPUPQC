<?php

    include('../Connection/db.php');

    $aid = $_POST['_aid'];
    $currdate = date('Y-m-d');

    $query = mysqli_query($connection,"INSERT INTO `ams_t_transfer_out_ptr_sub` (A_ID, PTR_ID) 
                                    VALUES ($aid, (SELECT MAX(PTR_ID) FROM `ams_t_transfer_out_ptr`) )");

    $query2 = mysqli_query($connection,"UPDATE `ams_r_asset` SET A_STATUS = 'Transferred Out' WHERE A_ID = $aid");

    echo "INSERT INTO `ams_t_transfer_out_ptr_sub` (A_ID, PTR_ID) 
                                    VALUES ($aid, (SELECT MAX(PTR_ID) FROM `ams_t_transfer_out_ptr`) )";

	echo "UPDATE `ams_r_asset` SET A_STATUS = 'Transferred Out' WHERE A_ID = $aid";

?>
