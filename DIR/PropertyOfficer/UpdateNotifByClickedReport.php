<?php

    include('../Connection/db.php');

    $id = $_POST['_id'];

    $query1 = mysqli_query($connection,"UPDATE ams_t_report_of_damage SET ROD_VIEW_CLICKED = 1 WHERE ROD_ID = $id");            

    echo "UPDATE ams_t_report_of_damage SET ROD_VIEW_CLICKED = 1 WHERE ROD_ID = $id";

?>