<?php
	
	include('db.php');

    $id = $_GET['_abc'];
    
    $id1 = substr($id, 0, -1);

    $querys = mysqli_query($connection, "SELECT * FROM `ams_r_asset` WHERE A_ID IN ($id1)");
    while($row = mysqli_fetch_assoc($querys))
    {
        $gg1 = $row['A_ID'];
    }

    echo json_encode(
          array("gg1" => $gg1)
     );

?>
