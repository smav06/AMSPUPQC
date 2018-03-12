<?php

    $user2 = 'root';
    $pass2 = '';
    $dbnm2 = 'ams_sample_db';

    try 
    {
        $dbh2 = new PDO('mysql:host=localhost;dbname='.$dbnm2, $user2, $pass2);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt2 = $dbh2->prepare("INSERT INTO ams_t_user_request_summary(URS_REQUEST_DATE, URS_PURPOSE, EP_ID) VALUES (?, ?, ?)");
    $stmt2->bindParam(1, $getdate);
    $stmt2->bindParam(2, $purpose);
    $stmt2->bindParam(3, $epid);

    $arr2 = $_POST;
    $getdate = $arr2['currentdate'];
    $purpose = $arr2['urs_purpose'];
    $epid = $arr2['currentempid'];  
    $stmt2->execute();

    echo $getdate;
    echo $purpose;
    echo $epid;
    echo "<br>";

    $dbh2 = null;

?>


<?php  

    $user = 'root';
    $pass = '';
    $dbnm = 'ams_sample_db';

    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt = $dbh->prepare("INSERT INTO ams_t_user_request(UR_DESCRIPTION, UR_UNIT, UR_QUANTITY, URS_ID, EP_ID, AT_ID) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $description);
    $stmt->bindParam(2, $unit);
    $stmt->bindParam(3, $qty);
    $stmt->bindParam(4, $ursid);
    $stmt->bindParam(5, $reqepid);
    $stmt->bindParam(6, $atid);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['UR_DESCRIPTION'])-1;$i++)
    {
        $description = $arr['UR_DESCRIPTION'][$i];
        $unit = substr($arr['UR_UNIT'][$i], 2);
        $qty = $arr['UR_QUANTITY'][$i]; 
        $ursid = substr($arr['UR_UNIT'][$i], 0,1);   
        $reqepid = $arr['EP_ID'][$i];   
        $atid = $arr['AT_ID'][$i];   
        $stmt->execute();

        echo $description;
        echo $unit;
        echo $qty;
        echo $ursid;
        echo $reqepid;
        echo $atid;
        echo "<br>";
    }

    header('Location: DURequest.php');

?>