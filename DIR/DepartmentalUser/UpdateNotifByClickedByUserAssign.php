<?php

    include('../Connection/db.php');

    $id = $_POST['_id'];

    $query1 = mysqli_query($connection,"UPDATE ams_t_par SET PAR_DU_CLICKED = 1 WHERE PAR_ID = $id");            

    echo "UPDATE ams_t_par SET PAR_DU_CLICKED = 1 WHERE PAR_ID = $id";

?>