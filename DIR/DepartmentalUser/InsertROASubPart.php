<?php

    include('../Connection/db.php');

    $aid = $_POST['_aid'];
    $parid = $_POST['_parid'];
    $curruser = $_POST['_nameofcurruser'];
    $currdate = date('Y-m-d');


    $query2 = mysqli_query($connection,"UPDATE `ams_t_par_sub` SET PARS_CANCEL = 1, PARS_CANCEL_DATE = '$currdate', PARS_CANCEL_BY = '$curruser' WHERE A_ID = $aid AND PARS_ID = $parid");

    $query3 = mysqli_query($connection,"UPDATE `ams_r_asset` SET A_AVAILABILITY = 'Available' WHERE A_ID = $aid");

    $query = mysqli_query($connection,"INSERT INTO `ams_t_release_of_asset_sub` (A_ID, ROA_ID) 
                                    VALUES ($aid, (SELECT MAX(ROA_ID) FROM `ams_t_release_of_asset`) )");


    echo "INSERT INTO `ams_t_release_of_asset_sub` (A_ID, ROA_ID) 
                                    VALUES ($aid, (SELECT MAX(ROA_ID) FROM `ams_t_release_of_asset`))";

	echo "UPDATE `ams_t_par_sub` SET PARS_CANCEL = 1, PARS_CANCEL_DATE = '$currdate', PARS_CANCEL_BY = '$curruser' WHERE A_ID = $aid";

	echo "UPDATE `ams_r_asset` SET A_AVAILABILITY = 'Available' WHERE A_ID = $aid";                                                                               

?>
