<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser'])  && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";

    }

    if (isset($_GET['passedrodid'])) 
    {
        $passedrodid = $_GET['passedrodid'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="../../images/favicon.png">

    <title>Report Of Damage</title>

    <!--Core CSS -->
    <link href="../../bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/bootstrap-reset.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="../../js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="../../js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style-responsive.css" rel="stylesheet" />

    <!--icheck-->
    <link href="../../js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/minimal/red.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/minimal/green.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/minimal/yellow.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/minimal/purple.css" rel="stylesheet">

    <link href="../../js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/square/green.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/square/blue.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/square/yellow.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/square/purple.css" rel="stylesheet">

    <link href="../../js/iCheck/skins/flat/grey.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/flat/red.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/flat/blue.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/flat/yellow.css" rel="stylesheet">
    <link href="../../js/iCheck/skins/flat/purple.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../js/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="../../js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../../js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../../js/bootstrap-datepicker/css/datepicker.css" />

    <link href="../../js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link rel="icon" href="../../images/PUPLogo.png" sizes="32x32">

</head>

<body>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="PODashboard.php" class="logo">
        <img src="../../images/pupqcnew.png" style="width: 193px; height: 37px;" alt="">
    </a>

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-comment-o"></i>
                <span class="badge bg-warning count"></span>
            </a>
            
            <?php 

                $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXX FROM `ams_t_user_request_summary` AS URS WHERE URS.URS_STATUS_TO_PO = 'Pending'");

                while($rowx = mysqli_fetch_assoc($sqlcntx))
                {
                    $cnt = $rowx['XXX'];
                    echo '<input type="text" class="hidden" id="cntofreqs" value="'.$cnt.'" />';
                }

                if ($cnt == 0) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif" style="height: 70px;">
            </ul>

            <?php
                }
                elseif ($cnt == 1) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif" style="height: 110px;">
            </ul>

            <?php
                }
                elseif ($cnt == 2) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif" style="height: 220px;">
            </ul>

            <?php
                    
                }
                elseif ($cnt >= 3) 
                {                
            ?>

            <ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 330px;">
            </ul>

            <?php 
                }
            ?>

        </li>
        <!-- notification dropdown end -->

        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-warning"></i>
                <span class="badge bg-warning count2"></span>
            </a>
        </li>

        <li id="" class="">
            <a style="background-color: white;">
                <?php echo $_SESSION['mytype']; ?>
            </a>
        </li>
    </ul>
    <!--  notification end -->
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <?php  
                    include('../Connection/db.php');

                    $sql = "SELECT * FROM ams_r_employee_profile AS EP JOIN ams_r_user AS U ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME = '".$_SESSION['myuser']."'";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) 
                    {
                      $pic = $row['EP_PICTURE'];
                      echo '<img alt="" src="../../'.$pic.'" alt="" >';
                    }

                  ?> 

                <span class="username"> <?php echo $_SESSION['mysesi']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="POProfile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>  
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
    <ul class="sidebar-menu" id="nav-accordion">
        <li>
            <a href="PODashboard.php">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="POAsset.php">
                <i class="fa fa-laptop"></i>
                <span>Assets</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-comment-o"></i>
                <span>Requests</span>
            </a>
            <ul class="sub">
                <li><a href="PODURequests.php">Departmental User Requests</a></li>                        
                <li><a href="PORequestToMain.php">Request From Main</a></li>
                <li><a href="POPPMP.php">PPMP</a></li>                 
            </ul>
        </li>
        <li>
            <a href="POAcquisition.php">
                <i class="fa fa-download"></i>
                <span>Acquisition</span>
            </a>
        </li>
        <li>
            <a href="POTransferAsset.php">
                <i class="fa fa-sign-out"></i>
                <span>Transfer Asset</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="active">
                <i class="fa fa-wrench"></i>
                <span>Maintenance</span>
            </a>
            <ul class="sub">
                <li><a href="POMaintenanceInsCheck.php">Inspection/Checking</a></li>
                <li class="active"><a href="POMaintenanceReport.php">Report Of Damage</a></li>                        
            </ul>
        </li>
        <li>
            <a href="PODisposal.php">
                <i class="fa fa-trash-o"></i>
                <span>Disposal</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa fa-table"></i>
                <span>Reports</span>
            </a>
            <ul class="sub">
                <li><a href="POPurchaseRequest.php">Purchase Request</a></li> 
                <li><a href="POPPMPReport.php">PPMP Report</a></li>   
                <li><a href="POPar.php">Property Accountability Receipt</a></li>
                <li><a href="POPtr.php">Property Transfer Report</a></li>   
                <!-- <li><a href="PORod.php">Report Of Damage</a></li>   -->
            </ul>
        </li>
    </ul>            
</div>
         <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="PODashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="POMaintenanceReport.php">Report Of Damage</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading"> 
                            EVALUATION OF Reported Damaged Asset
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                            </span>
                        </header>

                        <?php  
                            $sql = "SELECT ROD.ROD_ID, ROD.ROD_NO, ROD.ROD_REASON, O.O_NAME, ROD.ROD_DATE, ROD.ROD_STATUS FROM `ams_t_report_of_damage` AS ROD INNER JOIN `ams_t_report_of_damage_sub` AS RODS ON RODS.ROD_ID = ROD.ROD_ID INNER JOIN `ams_t_par_sub` AS PARS ON RODS.A_ID = PARS.A_ID INNER JOIN `ams_r_employee_profile` AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID WHERE ROD.ROD_ID = $passedrodid GROUP BY ROD.ROD_ID";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {                              
                                $rodid = $row['ROD_ID'];
                                $rodno = $row['ROD_NO'];
                                $rodreason = $row['ROD_REASON'];
                                $rodreportby = $row['O_NAME'];
                                $roddate = $row['ROD_DATE'];
                                $rodstatus = $row['ROD_STATUS'];
                        ?>

                        <div class="panel-body">
                            <div class="row group">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="hidden" id="allrodid" value="<?php echo $passedrodid; ?>">
                                        <label>Report No.</label>                                        
                                        <input type="text" value="<?php echo $rodno; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reported By</label>
                                        <input type="text" value="<?php echo $rodreportby; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Reported</label>
                                        <input type="Date" value="<?php echo $roddate; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Report</label>
                                        <input type="text" value="<?php echo $rodreason; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>

                                        <?php  
                                            if ($rodstatus == 'Pending') 
                                            {
                                        ?>

                                            <input type="text" value="<?php echo $rodstatus; ?>" class="form-control" style="color: black;" disabled />

                                        <?php
                                            }
                                            elseif ($rodstatus == 'Approved') 
                                            {
                                        ?>

                                            <input type="text" value="<?php echo $rodstatus; ?>" class="form-control" style="color: green;" disabled />

                                        <?php      # code...
                                            }
                                            elseif ($rodstatus == 'Reject') 
                                            {
                                        ?>

                                            <input type="text" value="<?php echo $rodstatus; ?>" class="form-control" style="color: red;" disabled />

                                        <?php
                                            }
                                        ?>

                                    </div>
                                </div>

                        <?php
                            }
                        ?>
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>

                                <?php  
                                    if ($rodstatus == 'Pending') 
                                    {
                                ?>
                                    
                                    <!-- ORIGINAL -->
                                    <div class="col-md-12">
                                        <div class="adv-table">
                                            <table class="display table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="display: none;">rods id</th>
                                                        <th style="display: none;">a id</th>
                                                        <th style="width: 200px;">Status Of Asset</th>
                                                        <th>Asset</th> 
                                                    </tr>
                                                </thead>

                                                <tbody> 
                                                    <?php  
                                                        $sql = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.A_ID = A.A_ID INNER JOIN ams_t_report_of_damage AS ROD ON RODS.ROD_ID = ROD.ROD_ID WHERE RODS.RODS_CANCEL_DATE IS NULL AND ROD.ROD_ID = $passedrodid";

                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                        $i = 0;

                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            $i++;  
                                                            $aid = $row['A_ID'];
                                                            $rodsid = $row['RODS_ID'];
                                                            $adescription = $row['A_DESCRIPTION'];
                                                    ?>

                                                    <tr class="gradeX">
                                                        <td style="display: none;"> <?php echo $rodsid; ?> </td>
                                                        <td style="display: none;"> <?php echo $aid; ?> </td>
                                                        <td> 
                                                            <center>
                                                                <select class="form-control selthis" id="<?php echo $i; ?>" style="color: black; width: 175px">
                                                                    <option value="" disabled ></option>
                                                                    <option value="For Repair" selected>For Repair</option>
                                                                    <option value="Repaired">Repaired</option>
                                                                    <option value="Ready For Disposal">Ready For Disposal</option>
                                                                </select>
                                                            </center>
                                                        </td>
                                                        <td> <?php echo $adescription; ?> </td>
                                                    </tr>

                                                    <?php
                                                        }
                                                    ?>

                                                    <?php
                                                        $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_t_report_of_damage_sub` WHERE ROD_ID = $passedrodid AND RODS_CANCEL_DATE IS NULL";

                                                        $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                        while($row1 = mysqli_fetch_assoc($result1))
                                                        {
                                                            $cnt = $row1['AAA'];
                                                            echo '<input type="text" class="hidden" id="getcount" value="'.$i.'" />';
                                                        }
                                                    ?>

                                                </tbody>                                            
                                            </table>
                                        </div>
                                    </div>

                                    <!-- CLONED DATA -->
                                    <div class="col-md-12 hidden">
                                        <div class="adv-table">
                                            CLONE
                                            <table class="display table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="">rods id</th>
                                                        <th style="width: 55px;">a id</th>
                                                        <th style="width: 200px;">Status Of Asset</th>
                                                        <th>Asset</th> 
                                                    </tr>
                                                </thead>

                                                <tbody id="newmodalgetrejected"> 
                                                    <?php  
                                                        $sql = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.A_ID = A.A_ID INNER JOIN ams_t_report_of_damage AS ROD ON RODS.ROD_ID = ROD.ROD_ID WHERE RODS.RODS_CANCEL_DATE IS NULL AND ROD.ROD_ID = $passedrodid";

                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                        $i = 0;

                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            $i++;  
                                                            $aid = $row['A_ID'];
                                                            $rodsid = $row['RODS_ID'];
                                                            $adescription = $row['A_DESCRIPTION'];
                                                    ?>

                                                    <tr class="gradeX">
                                                        <td id="origrodid<?php echo $i; ?>"> <?php echo $rodsid; ?> </td>
                                                        <td id="origaid<?php echo $i; ?>"> <?php echo $aid; ?> </td>
                                                        <td> 
                                                            <center>
                                                                <select class="form-control" id="selvalsz<?php echo $i; ?>" style="color: black; width: 175px">
                                                                    <option value="" disabled ></option>
                                                                    <option value="For Repair" selected>For Repair</option>
                                                                    <option value="Repaired">Repaired</option>
                                                                    <option value="Ready For Disposal">Ready For Disposal</option>
                                                                </select>
                                                            </center>
                                                        </td>
                                                        <td id="origadesc<?php echo $i; ?>"> <?php echo $adescription; ?> </td>
                                                    </tr>

                                                    <?php
                                                        }
                                                    ?>

                                                    <?php
                                                        $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_t_report_of_damage_sub` WHERE ROD_ID = $passedrodid AND RODS_CANCEL_DATE IS NULL";

                                                        $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                        while($row1 = mysqli_fetch_assoc($result1))
                                                        {
                                                            $cnt = $row1['AAA'];
                                                            echo '<input type="text" class="hidden" id="getcount" value="'.$i.'" />';
                                                        }
                                                    ?>

                                                </tbody>                                            
                                            </table>
                                        </div>
                                    </div>

                                    <!-- JOB ORDER -->
                                    <div class="col-md-12 hidden" id="clone2">
                                        <label>JOB ORDER / FOR REPAIR</label>
                                        <div class="adv-table">
                                            <table  class="display table table-bordered table-striped" id=" ">
                                                <thead>
                                                    <tr>
                                                        <th style="">rods id</th>
                                                        <th style="width: 55px;">a id</th>
                                                        <th style="width: 200px;">Status Of Asset</th>
                                                        <th>Asset</th> 
                                                    </tr>
                                                </thead>

                                                <tbody id="newmodalget">                                                 

                                                </tbody>                                            
                                            </table>
                                        </div>
                                    </div>

                                    <!-- READY FOR DISPOSAL -->
                                    <div class="col-md-12 hidden" id="clone3">
                                        <label>DISPOSAL / READY FOR DISPOSAL</label>
                                        <div class="adv-table">
                                            <table  class="display table table-bordered table-striped" id=" ">
                                                <thead>
                                                    <tr>
                                                        <th style="">rods id</th>
                                                        <th style="width: 55px;">a id</th>
                                                        <th style="width: 200px;">Status Of Asset</th>
                                                        <th>Asset</th> 
                                                    </tr>
                                                </thead>

                                                <tbody id="newmodalget2">                                                 

                                                </tbody>                                            
                                            </table>
                                        </div>
                                    </div>

                                    <!-- REPAIRED -->
                                    <div class="col-md-12 hidden" id="clone4">
                                        <label>REPAIRED / UPDATE</label>
                                        <div class="adv-table">
                                            <table  class="display table table-bordered table-striped" id=" ">
                                                <thead>
                                                    <tr>
                                                        <th style="">rods id</th>
                                                        <th style="width: 55px;">a id</th>
                                                        <th style="width: 200px;">Status Of Asset</th>
                                                        <th>Asset</th> 
                                                    </tr>
                                                </thead>

                                                <tbody id="newmodalget3">                                                 

                                                </tbody>                                            
                                            </table>
                                        </div>
                                    </div>

                                <?php
                                    }
                                    elseif ($rodstatus == 'Approved') 
                                    {
                                ?>

                                    <div class="col-md-12" id="clonezxc">
                                        <div class="adv-table">
                                            <table  class="display table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="display: none;">rods id</th>
                                                        <th style="display: none;">a id</th>
                                                        <th>Asset</th>
                                                        <th style="width: 200px;">Status Of Asset</th>
                                                    </tr>
                                                </thead>

                                                <tbody> 

                                                <?php  
                                                    $sqlx = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.A_ID = A.A_ID INNER JOIN ams_t_report_of_damage AS ROD ON RODS.ROD_ID = ROD.ROD_ID WHERE RODS.RODS_CANCEL_DATE IS NULL AND ROD.ROD_ID = $passedrodid";

                                                    $resultx = mysqli_query($connection, $sqlx) or die("Bad Query: $sql");

                                                    while($rowx = mysqli_fetch_assoc($resultx))
                                                    { 
                                                        $aidx = $rowx['A_ID'];
                                                        $rodsidx = $rowx['RODS_ID'];
                                                        $adescriptionx = $rowx['A_DESCRIPTION'];
                                                        $rodsevalx = $rowx['RODS_EVALUATION'];
                                                ?>                                               
                                                    <tr>
                                                        <td style="display: none;"> <?php echo $rodsidx; ?> </td>
                                                        <td style="display: none;"> <?php echo $aidx; ?> </td>
                                                        <td> <?php echo $adescriptionx; ?> </td>
                                                        <td> <?php echo $rodsevalx; ?> </td>
                                                    </tr>

                                                <?php
                                                    }
                                                ?>
                                                </tbody>                                            
                                            </table>
                                        </div>
                                    </div>

                                <?php
                                    }
                                    elseif ($rodstatus == 'Reject') 
                                    {
                                ?>

                                    <div class="col-md-12" id="cloneqwe">
                                        <div class="adv-table">
                                            <table  class="display table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="display: none;">rods id</th>
                                                        <th style="display: none;">a id</th>
                                                        <th>Asset</th>
                                                        <th style="width: 200px; display: none;">Status Of Asset</th>
                                                    </tr>
                                                </thead>

                                                <tbody> 

                                                <?php  
                                                    $sqlxe = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.A_ID = A.A_ID INNER JOIN ams_t_report_of_damage AS ROD ON RODS.ROD_ID = ROD.ROD_ID WHERE RODS.RODS_CANCEL_DATE IS NULL AND ROD.ROD_ID = $passedrodid";

                                                    $resultxe = mysqli_query($connection, $sqlxe) or die("Bad Query: $sql");

                                                    while($rowxe = mysqli_fetch_assoc($resultxe))
                                                    { 
                                                        $aidxe = $rowxe['A_ID'];
                                                        $rodsidxe = $rowxe['RODS_ID'];
                                                        $adescriptionxe = $rowxe['A_DESCRIPTION'];
                                                        $rodsevalxe = $rowxe['RODS_EVALUATION'];
                                                ?>                                               
                                                    <tr>
                                                        <td style="display: none;"> <?php echo $rodsidxe; ?> </td>
                                                        <td style="display: none;"> <?php echo $aidxe; ?> </td>
                                                        <td> <?php echo $adescriptionxe; ?> </td>
                                                        <td style="display: none;"> <?php echo $rodsevalxe; ?> </td>
                                                    </tr>

                                                <?php
                                                    }
                                                ?>
                                                </tbody>                                            
                                            </table>
                                        </div>
                                    </div>

                                <?php
                                    }
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="padding: 1px; margin-bottom: 10px;">                                                             
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>

                                <?php
                                    if ($rodstatus == 'Pending') 
                                    {
                                ?>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Remarks</label> 
                                            <textarea id="evalbymainremarks" class="form-control" style="resize: none; color: black; height: 85px;" maxlength="200"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Evaluation</label>
                                            <select class="form-control" style="color: black;" id="getseleval">
                                                <option selected disabled value=""></option>
                                                <option value="Approved">Approved</option>
                                                <option value="Reject">Reject</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <a id="btnevaluate" class="btn btn-success">Submit</a>
                                            <a href="POMaintenanceReport.php" class="btn btn-default">Go to report of damage</a>
                                        </div>
                                    </div>

                                <?php  
                                    }
                                    else
                                    {
                                ?>
                                    <div class="col-md-4">
                                        <a href="POMaintenanceReport.php" class="btn btn-default">Go to report of damage</a>
                                    </div>
                                <?php
                                    }
                                ?>
                                
                            </div>                            
                        </div>

                    </section>
                </div>
            </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
    <div class="search-row">
        <input type="text" placeholder="Search" class="form-control">
    </div>
    <div class="right-stat-bar">
        <ul class="right-side-accordion">
        <li class="widget-collapsible">
            <ul class="widget-container">
                <li>
                    <div class="prog-row side-mini-stat clearfix">
                        <div class="side-graph-info">
                            <h4>Target sell</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="target-sell">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>product delivery</h4>
                            <p>
                                55%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-delivery">
                                <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info payment-info">
                            <h4>payment collection</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-collection">
                                <span class="pc-epie-chart" data-percent="45">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>delivery pending</h4>
                            <p>
                                44%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="d-pending">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="col-md-12">
                            <h4>total progress</h4>
                            <p>
                                50%, Deadline 12 june 13
                            </p>
                            <div class="progress progress-xs mtop10">
                                <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        </ul>
    </div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
    <script src="../../js/jquery.js"></script>
    <script src="../../bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="../../js/jquery.nicescroll.js"></script>
    <!--Easy Pie Chart-->
    <script src="../../js/easypiechart/jquery.easypiechart.js"></script>
    <!--Sparkline Chart-->
    <script src="../../js/sparkline/jquery.sparkline.js"></script>
    <!--jQuery Flot Chart-->
    <script src="../../js/flot-chart/jquery.flot.js"></script>
    <script src="../../js/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="../../js/flot-chart/jquery.flot.resize.js"></script>
    <script src="../../js/flot-chart/jquery.flot.pie.resize.js"></script>

    <!--dynamic table-->
    <script type="text/javascript" language="javascript" src="../../js/advanced-datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../js/data-tables/DT_bootstrap.js"></script>
    <!--common script init for all pages-->
    <script src="../../js/scripts.js"></script>

    <!--dynamic table initialization -->
    <script src="../../js/dynamic_table_init.js"></script>

    <script src="../../js/iCheck/jquery.icheck.js"></script>

    <script type="text/javascript" src="../../js/ckeditor/ckeditor.js"></script>

    <!--icheck init -->
    <script src="../../js/icheck-init.js"></script>

    <script type="text/javascript" src="../../js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../../js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../../js/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="../../js/advanced-form.js"></script>

    <script type="text/javascript" src="../../js/plugins/sweetalert/sweetalert.min.js"></script>   

</body>
</html>

<script>

$(document).ready(function(){

    

    allNextSelect = $('.selthis');

    allNextSelect.change(function() {
        if (this.options[this.selectedIndex].value == 'Repaired') 
        {    
            // alert('Repaired');     
            // alert(this.id);
            document.getElementById('selvalsz' + this.id).value = 'Repaired';
        } 
        else if(this.options[this.selectedIndex].value == 'For Repair') 
        {
            // alert('For Repair');  
            // alert(this.id);
            document.getElementById('selvalsz' + this.id).value = 'For Repair'; 
        }
        else if(this.options[this.selectedIndex].value == 'Ready For Disposal') 
        {
            // alert('Ready For Disposal');   
            // alert(this.id);
            document.getElementById('selvalsz' + this.id).value = 'Ready For Disposal';
        }
    });
    
    $('#btnevaluate').click(function() {
        var getthecnt = document.getElementById('getcount').value;

        for (var z = getthecnt; z > 0; z--) {
            var ck = 'selvalsz' + z;
            var idofcloned = ck;
            // alert(idofcloned);

            var e = document.getElementById(idofcloned);
            var get = e.options[e.selectedIndex].value;
            // alert(get);
        }

        var getthecnt = document.getElementById('getcount').value;
        var ck = '';
        var filltable = '';
        var filltablex = '';
        var filltabley = '';

        // JOB ORDER (FOR REPAIR)
        for (var z = getthecnt; z > 0; z--) {

            var ck = 'selvalsz' + z;
            var ek = document.getElementById(ck);
            var getk = ek.options[ek.selectedIndex].value;

            if (document.getElementById(ck).options[ek.selectedIndex].value == 'For Repair') {
                var idz = document.getElementById('origrodid' + z).innerText;
                var reqz = document.getElementById('origaid' + z).innerText;
                var unitz = document.getElementById('origadesc' + z).innerText;
                var qtyz = document.getElementById('selvalsz' + z).options[ek.selectedIndex].value;
                filltable = filltable + '<tr><td class="">' + idz + '</td><td>' + reqz + '</td><td>' + qtyz + '</td><td>' + unitz + '</td></tr>';
            }
            document.getElementById('newmodalget').innerHTML = filltable;
        }

        // DISPOSAL (READY FOR DISPOSAL)
        for (var x = getthecnt; x > 0; x--) {

            var ckx = 'selvalsz' + x;
            var ekx = document.getElementById(ckx);
            var getkx = ekx.options[ekx.selectedIndex].value;

            if (document.getElementById(ckx).options[ekx.selectedIndex].value == 'Ready For Disposal') {
                var idx = document.getElementById('origrodid' + x).innerText;
                var reqx = document.getElementById('origaid' + x).innerText;
                var unitx = document.getElementById('origadesc' + x).innerText;
                var qtyx = document.getElementById('selvalsz' + x).options[ekx.selectedIndex].value;
                filltablex = filltablex + '<tr><td class="">' + idx + '</td><td>' + reqx + '</td><td>' + qtyx + '</td><td>' + unitx + '</td></tr>';
            }
            document.getElementById('newmodalget2').innerHTML = filltablex;
        }

        // REPAIRED
        for (var y = getthecnt; y > 0; y--) {

            var cky = 'selvalsz' + y;
            var eky = document.getElementById(cky);
            var getky = eky.options[eky.selectedIndex].value;

            if (document.getElementById(cky).options[eky.selectedIndex].value == 'Repaired') {
                var idy = document.getElementById('origrodid' + y).innerText;
                var reqy = document.getElementById('origaid' + y).innerText;
                var unity = document.getElementById('origadesc' + y).innerText;
                var qtyy = document.getElementById('selvalsz' + y).options[eky.selectedIndex].value;
                filltabley = filltabley + '<tr><td class="">' + idy + '</td><td>' + reqy + '</td><td>' + qtyy + '</td><td>' + unity + '</td></tr>';
            }
            document.getElementById('newmodalget3').innerHTML = filltabley;
        }

        var remakrsofreport = document.getElementById('evalbymainremarks').value;
        var gettheeval = document.getElementById('getseleval');
        var finaleval = gettheeval.options[gettheeval.selectedIndex].value;
        var allrodid = document.getElementById('allrodid').value;
        // alert(allrodid);
        // alert(finaleval);
        // alert(remakrsofreport);

        if (finaleval == '') 
        {
            alert('Evaluate First!');
        }
        else if (finaleval == 'Approved') 
        {
            // alert('APPROVED!');

            swal({

                title: "Are you sure you want to approve this report?",
                text: "The departmental user will notify about this action.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes',
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            },

            function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        type: 'POST',
                        url: 'ApprovedReport.php',
                        async: false,
                        data: {
                            _rodid: allrodid,
                            _finaleval: finaleval,
                            _remakrsofreport: remakrsofreport
                        },
                        success: function(data2) {
                            // alert(data2);    
                            // swal("Report Approved!", "Approved.", "error");

                            // setTimeout(function() 
                            // {
                            //     window.location = 'POMaintenanceReport.php';
                            // },2500);                                
                        },
                        error: function(response2) {
                            //alert(response2);                                    
                        }

                    });

                    //FOR REPAIRED ASSET
                    $('#newmodalget3 tr').each(function(index, val) {

                        $.ajax({
                            type: 'POST',
                            url: 'ApprovedReportRepaired.php',
                            async: false,
                            data: {
                                _rodsid: $(this).closest('tr').children('td:first').text(),
                                _finaleval: finaleval
                            },
                            success: function(data2) {
                                // alert(data2);
                                swal("Report Approved!", "Approved.", "success");

                                setTimeout(function() 
                                {
                                    // window.location = 'POMaintenanceReport.php';
                                    window.location = window.location;
                                },2500);  
                                
                            },
                            error: function(response2) {
                                // alert(response2);

                                swal("Error", "May mali bry eh!", "error");
                            }

                        });
                    });

                    // FOR READY FOR DISPOSAL
                    $('#newmodalget2 tr').each(function(index, val) {

                        $.ajax({
                            type: 'POST',
                            url: 'ApprovedReportReadyForDisposal.php',
                            async: false,
                            data: {
                                _rodsid: $(this).closest('tr').children('td:first').text(),
                                _aid: $(this).closest('tr').children('td:first').next().text(),
                                _finaleval: finaleval
                            },
                            success: function(data2) {
                                // alert(data2);
                                
                                swal("Report Approved!", "Approved.", "success");

                                setTimeout(function() 
                                {
                                    // window.location = 'POMaintenanceReport.php';
                                    window.location = window.location;
                                },2500);  
                                
                            },
                            error: function(response2) {
                                // alert(response2);

                                swal("Error", "May mali bry eh!", "error");
                            }

                        });
                    });

                    // FOR REPAIR / JOB ORDER
                    $('#newmodalget tr').each(function(index, val) {

                        $.ajax({
                            type: 'POST',
                            url: 'ApprovedReportForRepair.php',
                            async: false,
                            data: {
                                _rodsid: $(this).closest('tr').children('td:first').text(),
                                _aid: $(this).closest('tr').children('td:first').next().text(),
                                _finaleval: finaleval
                            },
                            success: function(data2) {
                                // alert(data2);

                                swal("Report Approved!", "Approved.", "success");

                                setTimeout(function() 
                                {
                                    // window.location = 'POMaintenanceReport.php';
                                    window.location = window.location;
                                },2500);  
                                
                            },
                            error: function(response2) {
                                // alert(response2);

                                swal("Error", "May mali bry eh!", "error");
                            }

                        });
                    });

                } 
                else
                {
                    swal("Cancelled", "The transaction is cancelled", "error");
                }

            });

        }
        else if (finaleval == 'Reject') 
        {
            // alert('REJECTED </3');

            swal({

                title: "Are you sure you want to reject this report?",
                text: "The departmental user will notify about this action.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes',
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            },

            function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        type: 'POST',
                        url: 'RejectReport.php',
                        async: false,
                        data: {
                            _rodid: allrodid,
                            _finaleval: finaleval,
                            _remakrsofreport: remakrsofreport
                        },
                        success: function(data2) {
                            // alert(data2);    
                            swal("Report Rejected!", "Rejected.", "error");

                            setTimeout(function() 
                            {
                                window.location = 'POMaintenanceReport.php';
                            },2500);                                
                        },
                        error: function(response2) {
                            //alert(response2);                                    
                        }

                    });
                } 
                else
                {
                    swal("Cancelled", "The transaction is cancelled", "error");
                }

            });

        }

    });

    function load_unseen_notification(view = '') {
        $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{view:view},
            dataType:"json",
       
        success:function(data)
        {
            $('.dispnotif').html(data.notification);

            if(data.unseen_notification > 0)
            {
                $('.count').html(data.unseen_notification);
            }
        }

        });
    }
     
    load_unseen_notification();
     
    $(document).on('click', '.dropdown-toggle', function() {
        $('.count').html('');
        load_unseen_notification('yes');
    });
     
    setInterval(function(){ 
        load_unseen_notification();; 
    }, 1000);
 
});
</script>