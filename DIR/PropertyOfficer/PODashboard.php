<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";
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
    <title>Dashboard</title>
    <!--Core CSS -->
    <link href="../../bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="../../css/bootstrap-reset.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="../../css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="../../js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../../js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style-responsive.css" rel="stylesheet"/>

    <link rel="icon" href="../../images/PUPLogo.png" sizes="32x32">
    <script src="../../code/highcharts.js"></script>
    <script src="../../code/modules/data.js"></script>
    <script src="../../code/modules/drilldown.js"></script>

</head>
<body>
<section id="container">
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
            <a data-toggle="dropdown" class="dropdown-toggle dt" href="#">
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

                echo '<ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 330px;">
            </ul>';
            ?>

        </li>
        <!-- notification dropdown end -->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle dt2" href="#">
                <i class="fa fa-warning"></i>
                <span class="badge bg-warning count2"></span>
            </a>

            <?php 

                $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXX FROM `ams_t_report_of_damage` AS ROD WHERE ROD.ROD_STATUS = 'Pending'");

                while($rowx = mysqli_fetch_assoc($sqlcntx))
                {
                    $cnt = $rowx['XXX'];
                    echo '<input type="text" class="hidden" id="cntofreqs" value="'.$cnt.'" />';
                }

                echo '<ul class="dropdown-menu extended notification dispnotif2" style="overflow-y: scroll; height: 330px;">
            </ul>';

            ?>
        </li>

        <!-- COPY NYO TO SA IBA MICA -->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle dt3" href="#">
                <i class="fa fa-exclamation-circle"></i>
                <span class="badge bg-warning count3"></span>
            </a>

            <?php 

                $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXX FROM `ams_t_report_of_damage` AS ROD WHERE ROD.ROD_STATUS = 'Pending'");

                while($rowx = mysqli_fetch_assoc($sqlcntx))
                {
                    $cnt = $rowx['XXX'];
                    echo '<input type="text" class="hidden" id="cntofreqs" value="'.$cnt.'" />';
                }

                echo '<ul class="dropdown-menu extended notification dispnotif3" style="overflow-y: scroll; height: 330px;">
            </ul>';
            ?>

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
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="PODashboard.php">
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
                        <!-- <li><a href="POPPMP.php">PPMP</a></li>            -->
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
                    <a href="javascript:;">
                        <i class="fa fa-wrench"></i>
                        <span>Maintenance</span>
                    </a>
                    <ul class="sub">
                        <li><a href="POMaintenanceInsCheck.php">Inspection/Checking</a></li>
                        <li><a href="POMaintenanceReport.php">Report Of Damage</a></li>
                        <li><a href="POMaintenanceJobOrder.php">Job Order</a></li>
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
                        <!-- <li><a href="POPPMPReport.php">PPMP Report</a></li> -->
                        <li><a href="POPropertyAccountabilityReceipt.php">Property Accountability Receipt</a></li>
                        <li><a href="POPropertyTransferReport.php">Property Transfer Report</a></li>
                        <li><a href="POJobOrder.php">Job Order</a></li>   
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

<!--mini statistics start-->
<div class="row hidden">
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="gauge-canvas">
                        <h4 class="widget-h">Monthly Expense</h4>
                        <canvas width=160 height=100 id="gauge"></canvas>
                    </div>
                    <ul class="gauge-meta clearfix">
                        <li id="gauge-textfield" class="pull-left gauge-value"></li>
                        <li class="pull-right gauge-title">Safe</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="daily-visit">
                        <h4 class="widget-h">Daily Visitors</h4>
                        <div id="daily-visit-chart" style="width:100%; height: 100px; display: block">

                        </div>
                        <ul class="chart-meta clearfix">
                            <li class="pull-left visit-chart-value">3233</li>
                            <li class="pull-right visit-chart-title"><i class="fa fa-arrow-up"></i> 15%</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <h4 class="widget-h">Top Advertise</h4>
                    <div class="sm-pie">
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!--mini statistics end-->
<div class="row hidden">
    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <div class="panel-body">

                <div id="graph-area" class="main-chart">
                </div>
            </div>
        </section>
        <!--earning graph end-->
    </div>
    <div class="col-md-4">
    </div>
</div>
<!--mini statistics start-->
<div class="row">
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-laptop"></i></span>
            <div class="mini-stat-info">
                <?php 
                    $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset`";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) 
                    {
                      $cnt = $row['C'];
                      
                ?>
                
                <span><?php echo $cnt; ?></span>
                
                <?php
                    }
                ?>

                Total No. Of Asset
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        Available: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_AVAILABILITY = 'Available' AND A_STATUS = 'Serviceable' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>

                    <div class="col-md-6">
                        Assigned: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_AVAILABILITY = 'Assigned' AND A_STATUS = 'Serviceable' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        For Repair: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'For Repair' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>                    

                    <div class="col-md-6">
                        Transferred: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'Transferred Out' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        On Job Order: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'On Job Order' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>

                    <div class="col-md-6">
                        For Disposal: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'For Disposal' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        Disposed: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'Disposed' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-comment-o"></i></span>
            <div class="mini-stat-info">
                <?php 

                    // $con = mysqli_connect("localhost", "root", "", "ams_sample_db");

                    $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_summary`";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) 
                    {
                      $cnt = $row['C'];
                      
                ?>
                
                <span><?php echo $cnt; ?></span>
                
                <?php
                    }
                ?>
                Total No. Of Request
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        Pending: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_summary` WHERE URS_STATUS_TO_PO = 'Pending' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>

                    <div class="col-md-12">
                        Approved: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_summary` WHERE URS_STATUS_TO_PO = 'Approved' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        Reject: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_summary` WHERE URS_STATUS_TO_PO = 'Reject' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>  
                    </div>
                </div>  

                <br>              

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-comment"></i></span>
            <div class="mini-stat-info">
                <?php 

                    // $con = mysqli_connect("localhost", "root", "", "ams_sample_db");

                    $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_status_to_main`";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) 
                    {
                      $cnt = $row['C'];
                      
                ?>
                
                <span><?php echo $cnt; ?></span>
                
                <?php
                    }
                ?>
                Request From Main
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        Pending: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_status_to_main` WHERE URSTM_STATUS_TO_MAIN = 'Pending' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>

                    <div class="col-md-12">
                        Approved: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_status_to_main` WHERE URSTM_STATUS_TO_MAIN = 'Approved' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        Reject: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_user_request_status_to_main` WHERE URSTM_STATUS_TO_MAIN = 'Reject' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>
                </div>
                
                <br>
                
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-warning"></i></span>
            <div class="mini-stat-info">
                <?php 

                    // $con = mysqli_connect("localhost", "root", "", "ams_sample_db");

                    $sql = "SELECT COUNT(*) AS C FROM `ams_t_report_of_damage`";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) 
                    {
                      $cnt = $row['C'];
                      
                ?>
                
                <span><?php echo $cnt; ?></span>
                
                <?php
                    }
                ?>
                Total No. Of Report
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        Pending: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_report_of_damage` WHERE ROD_STATUS = 'Pending' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>

                    <div class="col-md-6">
                        Evaluated: 
                        <?php 
                            $sql = "SELECT COUNT(*) AS C FROM `ams_t_report_of_damage` WHERE ROD_STATUS = 'Evaluated' ";
                            $result = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_array($result)) 
                            {
                              $cnt = $row['C'];
                              echo '<strong>'.$cnt.'</strong>';
                            }
                        ?>
                    </div>
                </div>

                <br>
                <br>
                <br>
                
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                <div id="containerzxc"></div>
            </div>
        </section>
    </div>

</div>
<!--mini statistics end-->

</section>
</section>




<?php 
    
    include('../Connection/db.php');

    $sql = "SELECT * FROM `ams_r_asset` GROUP BY A_STATUS, A_AVAILABILITY";
    $result = mysqli_query($connection, $sql);

    $getthewholestring = "";
    $getthewholestringfinal = "";
    $i=1;

    while ($row = mysqli_fetch_array($result)) 
    {

        $a_status = $row['A_STATUS'];
        $a_availability = $row['A_AVAILABILITY'];

        // echo $i.'<br>';
        if ($a_availability == 'Available' && $a_status == 'Serviceable') 
        {

            $sqlcntofavailorserv = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_AVAILABILITY = 'Available' AND A_STATUS = 'Serviceable' ";
            $resultcntofavailorserv = mysqli_query($connection, $sqlcntofavailorserv);

            while ($rowcntofavailorserv = mysqli_fetch_array($resultcntofavailorserv)) 
            {
              $cntcntofavailorserv = $rowcntofavailorserv['C'];
            }

            $getthewholestring = "{name: '$a_availability', y: $cntcntofavailorserv, drilldown: '$a_availability'},";
            
            // echo $getthewholestring;

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Serviceable') 
        {

            $sqlcntofavailassigned = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_AVAILABILITY = 'Assigned' AND A_STATUS = 'Serviceable' ";
            $resultcntofavailassigned = mysqli_query($connection, $sqlcntofavailassigned);

            while ($rowcntofavailassigned = mysqli_fetch_array($resultcntofavailassigned)) 
            {
              $cntcntofavailassigned = $rowcntofavailassigned['C'];
            }

            $getthewholestring = "{name: '$a_availability', y: $cntcntofavailassigned, drilldown: '$a_availability'},";

            // echo $getthewholestring;

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'For Disposal' || $a_availability =='Available' && $a_status == 'For Disposal') 
        {

            $sqlcntoffordisposal = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'For Disposal' ";
            $resultcntoffordisposal = mysqli_query($connection, $sqlcntoffordisposal);

            while ($rowcntoffordisposal = mysqli_fetch_array($resultcntoffordisposal)) 
            {
              $cntcntoffordisposal = $rowcntoffordisposal['C'];
            }

            $getthewholestring = "{name: '$a_status', y: $cntcntoffordisposal, drilldown: '$a_status'},";

            // echo $getthewholestring;

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'For Repair' || $a_availability =='Available' && $a_status == 'For Repair' ) 
        {

            $sqlcntcntofrepair = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'For Repair' ";
            $resultcntcntofrepair = mysqli_query($connection, $sqlcntcntofrepair);

            while ($rowcntcntofrepair = mysqli_fetch_array($resultcntcntofrepair)) 
            {
              $cntcntcntofrepair = $rowcntcntofrepair['C'];
            }

            $getthewholestring = "{name: '$a_status', y: $cntcntcntofrepair, drilldown: '$a_status'},";

            // echo $getthewholestring;

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'On Job Order' || $a_availability =='Available' && $a_status == 'On Job Order' ) 
        {

            $sqlcntojborder = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'On Job Order' ";
            $resultcntojborder = mysqli_query($connection, $sqlcntojborder);

            while ($rowcntojborder = mysqli_fetch_array($resultcntojborder)) 
            {
              $cntcntojborder = $rowcntojborder['C'];
            }

            $getthewholestring = "{name: '$a_status', y: $cntcntojborder, drilldown: '$a_status'},";

            // echo $getthewholestring;

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Disposed' || $a_availability =='Available' && $a_status == 'Disposed' ) 
        {

            $sqlcntofdisposed = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'Disposed' ";
            $resultcntofdisposed = mysqli_query($connection, $sqlcntofdisposed);

            while ($rowcntofdisposed = mysqli_fetch_array($resultcntofdisposed)) 
            {
              $cntcntofdisposed = $rowcntofdisposed['C'];
            }

            $getthewholestring = "{name: '$a_status', y: $cntcntofdisposed, drilldown: '$a_status'},";

            // echo $getthewholestring;

            $i++;
        }
        elseif ($a_availability =='Assigned' && $a_status == 'Transferred Out' || $a_availability =='Available' && $a_status == 'Transferred Out' ) 
        {

            $sqlcntoftransfer = "SELECT COUNT(*) AS C FROM `ams_r_asset` WHERE A_STATUS = 'Transferred Out' ";
            $resultcntoftransfer = mysqli_query($connection, $sqlcntoftransfer);

            while ($rowcntoftransfer = mysqli_fetch_array($resultcntoftransfer)) 
            {
              $cntcntoftransfer = $rowcntoftransfer['C'];
            }

            $getthewholestring = "{name: '$a_status', y: $cntcntoftransfer, drilldown: '$a_status'},";

            // echo $getthewholestring;

            $i++;
        }
    
        $getthewholestringfinal = $getthewholestringfinal.$getthewholestring;
        
    }

    // echo "<br><br><br><br>";
    // echo $getthewholestringfinal;

    $hehe = substr($getthewholestringfinal, 0, strlen($getthewholestringfinal) - 1);

    // echo $hehe;

?>




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

    // echo $hehe2;

?>

<!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">

<div class="right-stat-bar">
    <ul class="right-side-accordion">
        <li class="widget-collapsible">
            
            <ul class="widget-container">
                <li>
                    <div class="prog-row side-mini-stat clearfix">
                        
                        <div class="side-mini-graph">
                            <div class="target-sell">
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
<script src="../../js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="../../bs3/js/bootstrap.min.js"></script>
<script src="../../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../../js/jquery.scrollTo.min.js"></script>
<script src="../../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="../../js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../../js/skycons/skycons.js"></script>
<script src="../../js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="../../js/calendar/clndr.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="../../js/calendar/moment-2.2.1.js"></script>
<script src="../../js/evnt.calendar.init.js"></script>
<script src="../../js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="../../js/gauge/gauge.js"></script>
<!--clock init-->
<script src="../../js/css3clock/js/css3clock.js"></script>
<!--Easy Pie Chart-->
<script src="../../js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="../../js/sparkline/jquery.sparkline.js"></script>
<!--Morris Chart-->
<script src="../../js/morris-chart/morris.js"></script>
<script src="../../js/morris-chart/raphael-min.js"></script>
<!--jQuery Flot Chart-->
<script src="../../js/flot-chart/jquery.flot.js"></script>
<script src="../../js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="../../js/flot-chart/jquery.flot.resize.js"></script>
<script src="../../js/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="../../js/flot-chart/jquery.flot.animator.min.js"></script>
<script src="../../js/flot-chart/jquery.flot.growraf.js"></script>
<script src="../../js/dashboard.js"></script>
<script src="../../js/jquery.customSelect.min.js" ></script>
<!--common script init for all pages-->
<script src="../../js/scripts.js"></script>
<script type="text/javascript" src="../../js/plugins/sweetalert/sweetalert.min.js"></script>
<!--script for this page-->
</body>
</html>

<script>

function myFunction(id) {
     var id = id;
     // alert(id);

     $.ajax({
        type: 'POST',
        url: 'UpdateNotifByClicked.php',
        async: false,
        data: {
            _id: id
        },
        success: function(data2) {
            // alert(data2);                              
            // alert("tama");
        },
        error: function(response2) {
            // alert(response2);  
            // alert("mali");                                
        }

    });
}

function myFunction2(id) {
     var id = id;
     // alert(id);

     $.ajax({
        type: 'POST',
        url: 'UpdateNotifByClickedReport.php',
        async: false,
        data: {
            _id: id
        },
        success: function(data2) {
            // alert(data2);                              
            // alert("tama");
        },
        error: function(response2) {
            // alert(response2);  
            // alert("mali");                                
        }

    });
}


// COPY NYO ULIT TO MICA
function myFunction3(id) {
     var id = id;
     // alert(id);

     $.ajax({
        type: 'POST',
        url: 'UpdateNotifByClickedReport.php',
        async: false,
        data: {
            _id: id
        },
        success: function(data2) {
            // alert(data2);                              
            // alert("tama");
        },
        error: function(response2) {
            // alert(response2);  
            // alert("mali");                                
        }

    });
}

$(document).ready(function(){
 
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
     
    $(document).on('click', '.dt', function() {
        $('.count').html('');
        load_unseen_notification('yes');
    });
     
    setInterval(function(){ 
        load_unseen_notification();; 
    }, 1000);
 
});
</script>

<script type="text/javascript">

    $(document).ready(function(){
 
        function load_unseen_notification2(view2 = '') {
            $.ajax({
                url:"fetchreport.php",
                method:"POST",
                data:{view2:view2},
                dataType:"json",
           
            success:function(data2)
            {
                $('.dispnotif2').html(data2.notification2);

                if(data2.unseen_notification2 > 0)
                {
                    $('.count2').html(data2.unseen_notification2);
                }
            }

            });
        }
         
        load_unseen_notification2();
         
        $(document).on('click', '.dt2', function() {
            $('.count2').html('');
            load_unseen_notification2('yes');
        });
         
        setInterval(function(){ 
            load_unseen_notification2();; 
        }, 1000);
     
    });

</script>


<!-- COPY NYO TO MICA -->
<script type="text/javascript">

    $(document).ready(function(){
 
        function load_unseen_notification3(view3 = '') {
            $.ajax({
                url:"fetchurgent.php",
                method:"POST",
                data:{view3:view3},
                dataType:"json",
           
            success:function(data3)
            {
                $('.dispnotif3').html(data3.notification3);

                if(data3.unseen_notification3 > 0)
                {
                    $('.count3').html(data3.unseen_notification3);
                }
            }

            });
        }
         
        load_unseen_notification3();
         
        $(document).on('click', '.dt3', function() {
            $('.count3').html('');
            load_unseen_notification3('yes');
        });
         
        setInterval(function(){ 
            load_unseen_notification3();; 
        }, 1000);
     
    });

</script>

<script type="text/javascript">

    // Create the chart
    Highcharts.chart('containerzxc', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Polytechnic University of the Philippines Quezon City Branch <br> Asset Management System'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'TOTAL OF ASSET IN PUPQC'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
        },

        series: [{
            name: 'Asset',
            colorByPoint: true,
            data: [
                    <?php 
                        echo $hehe; 
                    ?>
                ]
        }],
        drilldown: {
            series: [
                <?php 
                    echo $hehe2;
                ?>
            ]
        }
    });
</script>