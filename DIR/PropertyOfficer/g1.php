


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

            $sqltyu = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE A.A_STATUS = 'Serviceable' AND A.A_AVAILABILITY = 'Available' GROUP BY AL.AL_ID";
            $resultsqltyu = mysqli_query($connection, $sqltyu);

            $getwholeinnerfinalsss = "";

            while ($rowiop = mysqli_fetch_array($resultsqltyu)) 
            { 

                $al_name = $rowiop['AL_NAME'];  

                $kwiri = "SELECT COUNT(*) AS QWEQWE FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE AL.AL_NAME = '$al_name' AND A.A_STATUS = 'Serviceable' AND A.A_AVAILABILITY = 'Available' ";
                
                $resultkwiri = mysqli_query($connection, $kwiri);
                
                while ($rowkwiri = mysqli_fetch_array($resultkwiri)) 
                {
                    $asdasdasd = $rowkwiri['QWEQWE'];
                } 
                            
                // echo $al_name;
                $getwholeinnerfinal = "['$al_name', $asdasdasd],";     
                $getwholeinnerfinalsss = $getwholeinnerfinalsss.$getwholeinnerfinal; 
            }

            
            $ertert = substr($getwholeinnerfinalsss, 0, strlen($getwholeinnerfinalsss) - 1);

            $getthewholestring2 = "{name: '$a_availability', id: '$a_availability', data: [ $ertert ]},";
            
            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Serviceable') 
        {

            $sqltyu = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE A.A_STATUS = 'Serviceable' AND A.A_AVAILABILITY = 'Assigned' GROUP BY AL.AL_ID";
            $resultsqltyu = mysqli_query($connection, $sqltyu);

            $getwholeinnerfinalsss = "";

            while ($rowiop = mysqli_fetch_array($resultsqltyu)) 
            { 

                $al_name = $rowiop['AL_NAME'];  

                $kwiri = "SELECT COUNT(*) AS QWEQWE FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE AL.AL_NAME = '$al_name' AND A.A_STATUS = 'Serviceable' AND A.A_AVAILABILITY = 'Assigned' ";
                
                $resultkwiri = mysqli_query($connection, $kwiri);
                
                while ($rowkwiri = mysqli_fetch_array($resultkwiri)) 
                {
                    $asdasdasd = $rowkwiri['QWEQWE'];
                } 
                            
                // echo $al_name;
                $getwholeinnerfinal = "['$al_name', $asdasdasd],";     
                $getwholeinnerfinalsss = $getwholeinnerfinalsss.$getwholeinnerfinal; 
            }

            
            $ertert = substr($getwholeinnerfinalsss, 0, strlen($getwholeinnerfinalsss) - 1);

            $getthewholestring2 = "{name: '$a_availability', id: '$a_availability', data: [ $ertert ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'For Disposal' || $a_availability =='Available' && $a_status == 'For Disposal') 
        {

            $sqltyu = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE A.A_STATUS = 'For Disposal' GROUP BY AL.AL_ID";
            $resultsqltyu = mysqli_query($connection, $sqltyu);

            $getwholeinnerfinalsss = "";

            while ($rowiop = mysqli_fetch_array($resultsqltyu)) 
            { 

                $al_name = $rowiop['AL_NAME'];  

                $kwiri = "SELECT COUNT(*) AS QWEQWE FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE AL.AL_NAME = '$al_name' AND A.A_STATUS = 'For Disposal'";
                
                $resultkwiri = mysqli_query($connection, $kwiri);
                
                while ($rowkwiri = mysqli_fetch_array($resultkwiri)) 
                {
                    $asdasdasd = $rowkwiri['QWEQWE'];
                } 
                            
                // echo $al_name;
                $getwholeinnerfinal = "['$al_name', $asdasdasd],";     
                $getwholeinnerfinalsss = $getwholeinnerfinalsss.$getwholeinnerfinal; 
            }

            
            $ertert = substr($getwholeinnerfinalsss, 0, strlen($getwholeinnerfinalsss) - 1);

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ $ertert ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'For Repair' || $a_availability =='Available' && $a_status == 'For Repair' ) 
        {

            $sqltyu = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE A.A_STATUS = 'For Repair' GROUP BY AL.AL_ID";
            $resultsqltyu = mysqli_query($connection, $sqltyu);

            $getwholeinnerfinalsss = "";

            while ($rowiop = mysqli_fetch_array($resultsqltyu)) 
            { 

                $al_name = $rowiop['AL_NAME'];  

                $kwiri = "SELECT COUNT(*) AS QWEQWE FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE AL.AL_NAME = '$al_name' AND A.A_STATUS = 'For Repair'";
                
                $resultkwiri = mysqli_query($connection, $kwiri);
                
                while ($rowkwiri = mysqli_fetch_array($resultkwiri)) 
                {
                    $asdasdasd = $rowkwiri['QWEQWE'];
                } 
                            
                // echo $al_name;
                $getwholeinnerfinal = "['$al_name', $asdasdasd],";     
                $getwholeinnerfinalsss = $getwholeinnerfinalsss.$getwholeinnerfinal; 
            }

            
            $ertert = substr($getwholeinnerfinalsss, 0, strlen($getwholeinnerfinalsss) - 1);

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ $ertert ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'On Job Order' || $a_availability =='Available' && $a_status == 'On Job Order' ) 
        {

            $sqltyu = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE A.A_STATUS = 'On Job Order' GROUP BY AL.AL_ID";
            $resultsqltyu = mysqli_query($connection, $sqltyu);

            $getwholeinnerfinalsss = "";

            while ($rowiop = mysqli_fetch_array($resultsqltyu)) 
            { 

                $al_name = $rowiop['AL_NAME'];  

                $kwiri = "SELECT COUNT(*) AS QWEQWE FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE AL.AL_NAME = '$al_name' AND A.A_STATUS = 'On Job Order'";
                
                $resultkwiri = mysqli_query($connection, $kwiri);
                
                while ($rowkwiri = mysqli_fetch_array($resultkwiri)) 
                {
                    $asdasdasd = $rowkwiri['QWEQWE'];
                } 
                            
                // echo $al_name;
                $getwholeinnerfinal = "['$al_name', $asdasdasd],";     
                $getwholeinnerfinalsss = $getwholeinnerfinalsss.$getwholeinnerfinal; 
            }

            
            $ertert = substr($getwholeinnerfinalsss, 0, strlen($getwholeinnerfinalsss) - 1);

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ $ertert ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Disposed' || $a_availability =='Available' && $a_status == 'Disposed' ) 
        {

            $sqltyu = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE A.A_STATUS = 'Disposed' GROUP BY AL.AL_ID";
            $resultsqltyu = mysqli_query($connection, $sqltyu);

            $getwholeinnerfinalsss = "";

            while ($rowiop = mysqli_fetch_array($resultsqltyu)) 
            { 

                $al_name = $rowiop['AL_NAME'];  

                $kwiri = "SELECT COUNT(*) AS QWEQWE FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE AL.AL_NAME = '$al_name' AND A.A_STATUS = 'Disposed'";
                
                $resultkwiri = mysqli_query($connection, $kwiri);
                
                while ($rowkwiri = mysqli_fetch_array($resultkwiri)) 
                {
                    $asdasdasd = $rowkwiri['QWEQWE'];
                } 
                            
                // echo $al_name;
                $getwholeinnerfinal = "['$al_name', $asdasdasd],";     
                $getwholeinnerfinalsss = $getwholeinnerfinalsss.$getwholeinnerfinal; 
            }

            
            $ertert = substr($getwholeinnerfinalsss, 0, strlen($getwholeinnerfinalsss) - 1);

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ $ertert ]},";

            // echo $getthewholestring."<br>";

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Transferred Out' || $a_availability =='Available' && $a_status == 'Transferred Out' ) 
        {

            $sqltyu = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE A.A_STATUS = 'Transferred Out' GROUP BY AL.AL_ID";
            $resultsqltyu = mysqli_query($connection, $sqltyu);

            $getwholeinnerfinalsss = "";

            while ($rowiop = mysqli_fetch_array($resultsqltyu)) 
            { 

                $al_name = $rowiop['AL_NAME'];  

                $kwiri = "SELECT COUNT(*) AS QWEQWE FROM ams_r_asset AS A INNER JOIN ams_r_asset_library AS AL ON A.AL_ID = AL.AL_ID WHERE AL.AL_NAME = '$al_name' AND A.A_STATUS = 'Transferred Out'";
                
                $resultkwiri = mysqli_query($connection, $kwiri);
                
                while ($rowkwiri = mysqli_fetch_array($resultkwiri)) 
                {
                    $asdasdasd = $rowkwiri['QWEQWE'];
                } 
                            
                // echo $al_name;
                $getwholeinnerfinal = "['$al_name', $asdasdasd],";     
                $getwholeinnerfinalsss = $getwholeinnerfinalsss.$getwholeinnerfinal; 
            }

            
            $ertert = substr($getwholeinnerfinalsss, 0, strlen($getwholeinnerfinalsss) - 1);
            // echo $ertert;

            $getthewholestring2 = "{name: '$a_status', id: '$a_status', data: [ $ertert ]},";

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