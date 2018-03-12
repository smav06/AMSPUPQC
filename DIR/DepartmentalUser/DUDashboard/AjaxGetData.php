<?php
	
	include('db.php');

    $id = $_GET['_final'];
    $querys = mysqli_query($connection, "SELECT A.A_CODE, A.A_DESCRIPTION, P.EP_ID, A.A_ID FROM ams_r_asset AS A INNER JOIN ams_t_par AS P ON P.A_ID = A.A_ID WHERE A.A_CODE = '$id' ");
    while($row = mysqli_fetch_assoc($querys))
    {
        $qrcode = $row["A_CODE"];
        $descrip = $row['A_DESCRIPTION'];
        $empid = $row['EP_ID'];
        $astid = $row['A_ID'];
    }

    echo json_encode(
          array("qrcode" => $qrcode,
                "descrip" => $descrip,
                "empid" => $empid,
                "astid" => $astid)
     );

?>
