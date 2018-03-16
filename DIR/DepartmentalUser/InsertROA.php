<?php

    include('../Connection/db.php');

    $user = $_POST['_nameofcurruser'];
    $reason = $_POST['_reasontext'];
    $currdate = date('Y-m-d');

    $query = mysqli_query($connection,"INSERT INTO `ams_t_release_of_asset` (ROA_REASON, ROA_DATE, ROA_RELEASED_BY) 
                                        VALUES ('$reason','$currdate','$user')");            

    echo "INSERT INTO `ams_t_release_of_asset` (ROA_REASON, ROA_DATE, ROA_RELEASED_BY) 
                                        VALUES ('$reason','$currdate','$user')";

?>
