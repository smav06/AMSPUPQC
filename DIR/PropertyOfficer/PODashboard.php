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

                if ($cnt == 0) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif2" style="height: 70px;">
            </ul>

            <?php
                }
                elseif ($cnt == 1) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif2" style="height: 110px;">
            </ul>

            <?php
                }
                elseif ($cnt == 2) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif2" style="height: 220px;">
            </ul>

            <?php
                    
                }
                elseif ($cnt >= 3) 
                {                
            ?>

            <ul class="dropdown-menu extended notification dispnotif2" style="overflow-y: scroll; height: 330px;">
            </ul>

            <?php 
                }
            ?>
        </li>

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

                if ($cnt == 0) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif3" style="height: 70px;">
            </ul>

            <?php
                }
                elseif ($cnt == 1) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif3" style="height: 110px;">
            </ul>

            <?php
                }
                elseif ($cnt == 2) 
                {
            ?>

            <ul class="dropdown-menu extended notification dispnotif3" style="height: 220px;">
            </ul>

            <?php
                    
                }
                elseif ($cnt >= 3) 
                {                
            ?>

            <ul class="dropdown-menu extended notification dispnotif3" style="overflow-y: scroll; height: 330px;">
            </ul>

            <?php 
                }
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
                text: 'Total percent market share'
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
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Microsoft Internet Explorer',
                y: 56.33,
                drilldown: 'Microsoft Internet Explorer'
            }, {
                name: 'Chrome',
                y: 24.03,
                drilldown: 'Chrome'
            }, {
                name: 'Firefox',
                y: 10.38,
                drilldown: 'Firefox'
            }, {
                name: 'Safari',
                y: 4.77,
                drilldown: 'Safari'
            }, {
                name: 'Opera',
                y: 0.91,
                drilldown: 'Opera'
            }, {
                name: 'Proprietary or Undetectable',
                y: 0.2,
                drilldown: null
            }]
        }],
        drilldown: {
            series: [{
                name: 'Microsoft Internet Explorer',
                id: 'Microsoft Internet Explorer',
                data: [
                    [
                        'v11.0',
                        24.13
                    ],
                    [
                        'v8.0',
                        17.2
                    ],
                    [
                        'v9.0',
                        8.11
                    ],
                    [
                        'v10.0',
                        5.33
                    ],
                    [
                        'v6.0',
                        1.06
                    ],
                    [
                        'v7.0',
                        0.5
                    ]
                ]
            }, {
                name: 'Chrome',
                id: 'Chrome',
                data: [
                    [
                        'v40.0',
                        5
                    ],
                    [
                        'v41.0',
                        4.32
                    ],
                    [
                        'v42.0',
                        3.68
                    ],
                    [
                        'v39.0',
                        2.96
                    ],
                    [
                        'v36.0',
                        2.53
                    ],
                    [
                        'v43.0',
                        1.45
                    ],
                    [
                        'v31.0',
                        1.24
                    ],
                    [
                        'v35.0',
                        0.85
                    ],
                    [
                        'v38.0',
                        0.6
                    ],
                    [
                        'v32.0',
                        0.55
                    ],
                    [
                        'v37.0',
                        0.38
                    ],
                    [
                        'v33.0',
                        0.19
                    ],
                    [
                        'v34.0',
                        0.14
                    ],
                    [
                        'v30.0',
                        0.14
                    ]
                ]
            }, {
                name: 'Firefox',
                id: 'Firefox',
                data: [
                    [
                        'v35',
                        2.76
                    ],
                    [
                        'v36',
                        2.32
                    ],
                    [
                        'v37',
                        2.31
                    ],
                    [
                        'v34',
                        1.27
                    ],
                    [
                        'v38',
                        1.02
                    ],
                    [
                        'v31',
                        0.33
                    ],
                    [
                        'v33',
                        0.22
                    ],
                    [
                        'v32',
                        0.15
                    ]
                ]
            }, {
                name: 'Safari',
                id: 'Safari',
                data: [
                    [
                        'v8.0',
                        2.56
                    ],
                    [
                        'v7.1',
                        0.77
                    ],
                    [
                        'v5.1',
                        0.42
                    ],
                    [
                        'v5.0',
                        0.3
                    ],
                    [
                        'v6.1',
                        0.29
                    ],
                    [
                        'v7.0',
                        0.26
                    ],
                    [
                        'v6.2',
                        0.17
                    ]
                ]
            }, {
                name: 'Opera',
                id: 'Opera',
                data: [
                    [
                        'v12.x',
                        0.34
                    ],
                    [
                        'v28',
                        0.24
                    ],
                    [
                        'v27',
                        0.17
                    ],
                    [
                        'v29',
                        0.16
                    ]
                ]
            }]
        }
    });
</script>