<?php

    include('../Connection/db.php');

    $transferredby = $_POST['_nameofcurruser'];
    $reasonremarks = $_POST['_reason'];
    $receivedby = $_POST['_nameofreceiver'];
    $ptrdate = $_POST['_gdate'];
    $cid = $_POST['_get'];

    $view_query = mysqli_query($connection,"(SELECT CONCAT('PTR-2018-', RIGHT(10000 +(SELECT IFNULL((SELECT COUNT(*) FROM `ams_t_transfer_out_ptr`), 1) + 1), 4)) AS GETPTR)");

    while($row = mysqli_fetch_assoc($view_query))
    {   

        $getptr = $row["GETPTR"];

    }

    $query = mysqli_query($connection,"INSERT INTO `ams_t_transfer_out_ptr` (PTR_NO, PTR_DATE, PTR_RECEIVED_BY, PTR_REMARKS, PTR_TRANSFERRED_BY, C_ID) VALUES ('$getptr', '$ptrdate', '$receivedby', '$reasonremarks', '$transferredby', $cid)");            

    echo "INSERT INTO `ams_t_transfer_out_ptr` (PTR_NO, PTR_DATE, PTR_RECEIVED_BY, PTR_REMARKS, PTR_TRANSFERRED_BY, C_ID) VALUES ('$getptr', '$ptrdate', '$receivedby', '$reasonremarks', '$transferredby', $cid)";

?>
