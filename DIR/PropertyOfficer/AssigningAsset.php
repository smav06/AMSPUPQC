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

    $stmt2 = $dbh2->prepare("INSERT INTO ams_t_par(A_ID, PAR_ISSUED_BY, EP_ID, PAR_DATE, PAR_NO) VALUES (?, ?, ? ,? ,?)");
    $stmt2->bindParam(1, $apstid);
    $stmt2->bindParam(2, $pissuedby);
    $stmt2->bindParam(3, $pempid);
    $stmt2->bindParam(4, $ppardate);
    $stmt2->bindParam(5, $pparno);

    $getval = $_POST;
    $apstid = $getval['assignpassastid'];
    $pissuedby = $getval['assignpassissuedby'];
    $pempid = $getval['assignpassempid'];  
    $ppardate = $getval['assignpassdate'];
    $pparno = $getval['lastparid']; 
    
    $stmt2->execute();

    echo $apstid.' | ';
    echo $pissuedby.' | ';
    echo $pempid.' | ';
    echo $ppardate.' | ';
    echo $pparno;
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

    $stmt = $dbh->prepare("UPDATE ams_r_asset SET A_AVAILABILITY = 'Assigned' WHERE A_ID = ?");
    $stmt->bindParam(1, $apstid);

    $getval = $_POST;
    $apstid = $getval['assignpassastid'];
    $stmt->execute();

    echo $apstid.' ';
    echo "<br>";

    $dbh = null;

    header('Location: POAsset.php');

?>


