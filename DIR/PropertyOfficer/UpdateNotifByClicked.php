<?php

    include('../Connection/db.php');

    $id = $_POST['_id'];

    $query1 = mysqli_query($connection,"UPDATE ams_t_user_request_summary SET URS_VIEW_CLICKED = 1 WHERE URS_ID = $id");            

    echo "UPDATE ams_t_user_request_summary SET URS_VIEW_CLICKED = 1 WHERE URS_ID = $id";

?>