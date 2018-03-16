<?php

    $user2 = 'root';
    $pass2 = '';
    $dbnm2 = 'ams_semifinal_db';

    try 
    {
        $dbh2 = new PDO('mysql:host=localhost;dbname='.$dbnm2, $user2, $pass2);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $currentdate = date('Y-m-d');

    $stmt2 = $dbh2->prepare("INSERT INTO ams_t_user_request_summary(URS_REQUEST_DATE, URS_PURPOSE, URS_NO) VALUES (?, ?, ?)");
    $stmt2->bindParam(1, $getdate);
    $stmt2->bindParam(2, $purpose);
    $stmt2->bindParam(3, $ursno);

    $arr2 = $_POST;
    $getdate = $currentdate;
    $purpose = $arr2['urs_purpose'];
    $ursno = $arr2['getthefinalno'];  
    $stmt2->execute();

    echo $getdate;
    echo $purpose;
    echo $ursno;
    echo "<br>";

    $dbh2 = null;

?>


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

    $stmt = $dbh->prepare("INSERT INTO ams_t_user_request(UR_UNIT, UR_QUANTITY, URS_ID, EP_ID, AL_ID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $unit);
    $stmt->bindParam(2, $qty);
    $stmt->bindParam(3, $ursid);
    $stmt->bindParam(4, $reqepid);
    $stmt->bindParam(5, $alid);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['EP_ID'])-1;$i++)
    {
        $unit = $arr['UR_UNIT'][$i];
        $qty = $arr['UR_QUANTITY'][$i]; 
        $ursid = $arr2['getthefinalid'];   
        $reqepid = $arr['EP_ID'][$i];   
        $alid = $arr['AL_ID'][$i];   
        $stmt->execute();

        echo $unit.', ';
        echo $qty.', ';
        echo $ursid.', ';
        echo $reqepid.', ';
        echo $alid;
        echo "<br>";
    }

    header('Location: DURequest.php');

?>