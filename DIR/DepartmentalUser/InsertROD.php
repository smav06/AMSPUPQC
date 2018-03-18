<?php

    include('../Connection/db.php');

    $report = $_POST['_reporteddamagereason'];
    $currdate = date('Y-m-d');
    
    $view_query = mysqli_query($connection,"(SELECT CONCAT( 'ROD-2018-', RIGHT( 10000 +( SELECT IFNULL( ( SELECT COUNT(*) FROM `ams_t_report_of_damage` ), 1 ) + 1 ), 4 ) ) AS GETROD)");

    while($row = mysqli_fetch_assoc($view_query))
    {   
        $getrod = $row["GETROD"];
    }

    $query = mysqli_query($connection,"INSERT INTO `ams_t_report_of_damage` (ROD_NO, ROD_REASON, ROD_DATE) 
                                        VALUES ('$getrod', '$report', '$currdate') ");            

    echo "INSERT INTO `ams_t_report_of_damage` (ROD_NO, ROD_REASON, ROD_DATE) 
                                        VALUES ('$getrod', '$report', '$currdate') ";

?>
