


<?php 
    
    include('../Connection/db.php');

    $sql = "SELECT * FROM `ams_r_asset` GROUP BY A_STATUS, A_AVAILABILITY";
    $result = mysqli_query($connection, $sql);

    $getthewholestring2 = "";
    $getthewholestringfinal2 = "";
    $i=1;

    while ($row = mysqli_fetch_array($result)) 
    {

        $a_status = $row['A_STATUS'];
        $a_availability = $row['A_AVAILABILITY'];

        // echo $i.'<br>';
        if ($a_availability == 'Available' && $a_status == 'Serviceable') 
        {

            $getthewholestring2 = "{name: '$a_availability', id: '$a_availability', data: [ ]},";
            
            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Serviceable') 
        {

            $getthewholestring2 = "{name: '$a_availability', id: '$a_availability', data: [ ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'For Disposal' || $a_availability =='Available' && $a_status == 'For Disposal') 
        {

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'For Repair' || $a_availability =='Available' && $a_status == 'For Repair' ) 
        {

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'On Job Order' || $a_availability =='Available' && $a_status == 'On Job Order' ) 
        {

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Disposed' || $a_availability =='Available' && $a_status == 'Disposed' ) 
        {

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Transferred Out' || $a_availability =='Available' && $a_status == 'Transferred Out' ) 
        {

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
    
        $getthewholestringfinal2 = $getthewholestringfinal2.$getthewholestring2;
        
    }

    // echo "<br><br><br><br>";
    // echo $getthewholestringfinal;

    $hehe2 = substr($getthewholestringfinal2, 0, strlen($getthewholestringfinal2) - 1);

    echo $hehe2;

?>