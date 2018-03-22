<?php

    $user = 'root';
    $pass = '';
    $dbnm = 'ams_semifinal_db';

    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt = $dbh->prepare("INSERT INTO `ams_r_asset` (A_DESCRIPTION, AL_ID, A_DATE, A_ACQUISITION_TYPE) VALUES (?, ?, ?, 'Donation')");
    $stmt->bindParam(1, $desc);
    $stmt->bindParam(2, $alid);
    $stmt->bindParam(3, $adate);

    $arr = $_POST; 
    for($i = 0; $i <= count($arr['A_DESCRIPTION'])-1;$i++)
    {
        $desc = $arr['A_DESCRIPTION'][$i];
        $alid = $arr['AL_ID'][$i];
        $adate = $arr['A_DATE'][$i];
        $stmt->execute();

        echo $desc.'<br>';
        echo $alid.'<br>';
        echo $adate.'<br>';
        echo "<br>";

    }

    header('Location: POAcquisition.php');

?>