<?php

    include('../Connection/db.php');

    $ursid = $_POST['_ursid'];
    $evals = $_POST['_evals'];
    $remarks = $_POST['_remarks'];
    $currdate = date('Y-m-d');

    if ($evals == 'Approved') 
    {
        if ($remarks == '')
        {
            $query1 = mysqli_query($connection,"UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_APPROVED_DATE_BY_MAIN = '$currdate' WHERE URS_ID = $ursid");            

            echo "UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_APPROVED_DATE_BY_MAIN = '$currdate' WHERE URS_ID = $ursid";
        }
        else  
        {
            $query1 = mysqli_query($connection,"UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_APPROVED_DATE_BY_MAIN = '$currdate', URSTM_REMARKS = '$remarks' WHERE URS_ID = $ursid");            

            echo "UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_APPROVED_DATE_BY_MAIN = '$currdate', URSTM_REMARKS = '$remarks' WHERE URS_ID = $ursid";
        }
    }
    elseif ($evals == 'Reject') 
    {
        if ($remarks == '')
        {
            $query = mysqli_query($connection,"UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_REJECT_DATE_BY_MAIN = '$currdate' WHERE URS_ID = $ursid");            

            echo "UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_APPROVED_DATE_BY_MAIN = '$currdate' WHERE URS_ID = $ursid";
        }
        else  
        {
            $query = mysqli_query($connection,"UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_REJECT_DATE_BY_MAIN = '$currdate', URSTM_REMARKS = '$remarks' WHERE URS_ID = $ursid");            

            echo "UPDATE ams_t_user_request_status_to_main SET URSTM_STATUS_TO_MAIN = '$evals', URSTM_APPROVED_DATE_BY_MAIN = '$currdate', URSTM_REMARKS = '$remarks' WHERE URS_ID = $ursid";
        }
    }

?>