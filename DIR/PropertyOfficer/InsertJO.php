<?php

    include('../Connection/db.php');

    $jodate = date('Y-m-d');

    $view_query = mysqli_query($connection,"(SELECT CONCAT('JO-2018-', RIGHT(10000 +(SELECT IFNULL((SELECT COUNT(*) FROM `ams_t_job_order`), 1) + 1), 4)) AS GETJO)");

    while($row = mysqli_fetch_assoc($view_query))
    {   

        $getjo = $row["GETJO"];

    }

    $query = mysqli_query($connection,"INSERT INTO `ams_t_job_order` (JO_NO, JO_DATE) VALUES ('$getjo', '$jodate')");            

    echo "INSERT INTO `ams_t_job_order` (JO_NO, JO_DATE) VALUES ('$getjo', '$jodate')";

?>
