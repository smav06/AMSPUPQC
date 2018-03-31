<?php

    include('../Connection/db.php');

    $aid = $_POST['_aid'];
    $_inspectresult = $_POST['_inspectresult'];     

    $query2 = mysqli_query($connection,"UPDATE `ams_r_asset` SET A_STATUS = '$_inspectresult' WHERE A_ID = $aid");
    
    echo "UPDATE `ams_r_asset` SET A_STATUS = '$_inspectresult' WHERE A_ID = $aid";

?>
