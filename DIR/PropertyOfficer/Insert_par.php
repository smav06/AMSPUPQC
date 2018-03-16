<?php

    include('../Connection/db.php');

    $no = $_POST['_name'];
    $date = $_POST['_date'];

    $view_query = mysqli_query($connection,"(
SELECT
    CONCAT(
        'PAR-2018-',
        RIGHT(
            10000 +(
            SELECT
                IFNULL(
                    (
                    SELECT
                        COUNT(*)
                    FROM
                        ams_t_par
                ),
                1
                ) + 1
        ),
        4
        )
    ) AS GETPAR
)");


    while($row = mysqli_fetch_assoc($view_query))
    {   

        $getpar = $row["GETPAR"];

    }


     $query = mysqli_query($connection,"INSERT INTO ams_t_par (PAR_NO,PAR_DATE,PAR_ISSUED_BY) 
                                        VALUES ('$getpar','$date','$no')  ");            


    echo "INSERT INTO ams_t_par (PAR_NO,PAR_DATE,PAR_ISSUED_BY) 
                                        VALUES ('$getpar','$date','$no')  ";

?>
