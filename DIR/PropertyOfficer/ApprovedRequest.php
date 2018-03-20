<?php

    include('../Connection/db.php');

    $remarks = $_POST['_remarks'];
    $evals = $_POST['_evals'];
    $ursid = $_POST['_ursid'];
    $currdate = date('Y-m-d');

    if ($evals == 'Approved') 
    {
        $query1 = mysqli_query($connection,"UPDATE ams_t_user_request_summary SET URS_STATUS_TO_PO = '$evals', URS_APPROVED_DATE = '$currdate', URS_REMARKS = '$remarks' WHERE URS_ID = $ursid");            

        echo "UPDATE ams_t_user_request_summary SET URS_STATUS_TO_PO = '$evals', URS_APPROVED_DATE = '$currdate', URS_REMARKS = '$remarks' WHERE URS_ID = $ursid";

        $query2 = mysqli_query($connection,"INSERT INTO ams_t_user_request_status_to_main (URS_ID) VALUES ($ursid)");

        echo "INSERT INTO ams_t_user_request_status_to_main (URS_ID) VALUES ($ursid)"; 

    }
    elseif ($evals == 'Reject') 
    {
        $query = mysqli_query($connection,"UPDATE ams_t_user_request_summary SET URS_STATUS_TO_PO = '$evals', URS_REJECT_DATE = '$currdate', URS_REMARKS = '$remarks' WHERE URS_ID = $ursid");            

        echo "UPDATE ams_t_user_request_summary SET URS_STATUS_TO_PO = '$evals', URS_REJECT_DATE = '$currdate', URS_REMARKS = '$remarks' WHERE URS_ID = $ursid";
    }

?>