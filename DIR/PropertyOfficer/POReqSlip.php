<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";

    }

    if (isset($_GET['receiveursid'])) 
    {
        $ids = $_GET['receiveursid'];
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

    <title>Request Slip</title>

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
                <i class="fa fa-bell-o"></i>
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
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
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
                <li><a href="POPPMP.php">PPMP Request</a></li>  
                <li><a href="PORequestToMain.php">Request To Main</a></li>                 
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
                <li><a href="POMaintenanceYearly.php">[ Maintenance Yearly ]</a></li>
                <li><a href="POMaintenanceReport.php">Report Of Damage</a></li>                        
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
                <li><a href="PORequestSlip.php">Request Slip</a></li> 
                <li><a href="POPPMPReport.php">PPMP Report</a></li>   
                <li><a href="POPar.php">Property Accountability Receipt</a></li>
                <li><a href="POPtr.php">Property Transfer Report</a></li>   
                <li><a href="PORod.php">Report Of Damage</a></li>  
            </ul>
        </li>
    </ul>            
</div
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
                        <li><a href="PORequestSlip.php">Request Slip</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: black;" class="panel-heading">
                            Request slip
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>

                        <?php  
                            $sql = "SELECT URS.URS_PURPOSE, URS.URS_NO, URS.URS_ID, URS.URS_REQUEST_DATE, O.O_NAME, URSTM.URSTM_STATUS_TO_MAIN, URABPO.URA_QUANTITY, ALS.AL_NAME FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request_status_to_main` AS URSTM ON URSTM.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request_approved_by_po` AS URABPO ON URABPO.UR_ID = UR.UR_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID INNER JOIN `ams_r_asset_library` AS ALS ON UR.AL_ID = ALS.AL_ID WHERE URS.URS_ID = $ids GROUP BY URS.URS_ID ORDER BY URS.URS_APPROVED_DATE DESC";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {                              
                                $urspurpose = $row['URS_PURPOSE'];
                                $ursno = $row['URS_NO'];
                                $ursdatereq = $row['URS_REQUEST_DATE'];
                                $ursreqby = $row['O_NAME'];
                                $ursid = $row['URS_ID'];
                                $mainstat = $row['URSTM_STATUS_TO_MAIN'];                              
                        ?>

                        <div class="panel-body">
                            <div class="row group">                                   

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Request No.</label>
                                        <input type="hidden" id="pinakaursid" value="<?php echo $ursid; ?>">
                                        <input type="text" value="<?php echo $ursno; ?>" class="form-control" style="color: black;" disabled  />
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Date Requested</label>
                                        <input type="Date" value="<?php echo $ursdatereq; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>                                

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Request To:</label>
                                        <input type="hidden" id="pinakaursid" value="<?php echo $ursid; ?>">
                                        <input type="text" value="PUP MAIN" class="form-control" style="color: black;" disabled  />
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Requested By:</label>
                                        <input type="text" value="PUP QC" class="form-control" style="color: black;" disabled  />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Purpose</label>
                                        <input type="text" value="<?php echo $urspurpose; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <!-- <label>Requests</label> -->
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="">Request</th>
                                                    <th style="width: 120px;">Unit</th>
                                                    <th style="width: 120px;">Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php  
                                                    $sqlz = "SELECT URS.URS_PURPOSE, URS.URS_NO, URS.URS_ID, URS.URS_REQUEST_DATE, O.O_NAME, URSTM.URSTM_STATUS_TO_MAIN, UR.UR_UNIT, URABPO.URA_QUANTITY, ALS.AL_NAME FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request_status_to_main` AS URSTM ON URSTM.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request_approved_by_po` AS URABPO ON URABPO.UR_ID = UR.UR_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID INNER JOIN `ams_r_asset_library` AS ALS ON UR.AL_ID = ALS.AL_ID WHERE URS.URS_ID = $ids ORDER BY URS.URS_APPROVED_DATE DESC";

                                                    $resultz = mysqli_query($connection, $sqlz) or die("Bad Query: $sql");

                                                    while($rowz = mysqli_fetch_assoc($resultz))
                                                    {
                                                        $requestname = $rowz['AL_NAME'];
                                                        $requestunit = $rowz['UR_UNIT'];
                                                        $requestqty = $rowz['URA_QUANTITY'];
                                                ?>

                                                <tr>
                                                    <td> <?php echo $requestname; ?> </td>
                                                    <td> <?php echo $requestunit; ?> </td>
                                                    <td> <?php echo $requestqty; ?> </td>
                                                </tr>

                                                <?php
                                                    }
                                                ?>
                                            </tbody>                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px;">                                                             
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 0.5px; margin-bottom: 10px; background: #757575;">                                                             
                                    </div>
                                </div>
                            </div>

                            <span class="pull-right">
                                <button type="button" class="btn btn-success" onclick="printonly()"><i class="fa fa-print"> PRINT</i></button>
                            </span>

                        </div>

                        <?php
                            }
                        ?>



                    </section>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <div id="printdisbook" class="panel-body" style="display: none;">
                            <br>
                            <center><img src="../../images/PUPLogo.png" height="100" width="100" /></center>
                            <br>
                            <center><h5>Polytechnic University of the Philippines Quezon City</h5></center>
                            <center><h5>Don Fabian St. Commonwealth Quezon City</h5></center>
                            <center><h6>REQUEST SLIP</h6></center>
                            <br>
                            <br>
                            <br>                        

                        <?php 
                            $sql = "SELECT URS.URS_PURPOSE, URS.URS_NO, URS.URS_ID, URS.URS_REQUEST_DATE, O.O_NAME, URSTM.URSTM_STATUS_TO_MAIN, URABPO.URA_QUANTITY, ALS.AL_NAME FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request_status_to_main` AS URSTM ON URSTM.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request_approved_by_po` AS URABPO ON URABPO.UR_ID = UR.UR_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID INNER JOIN `ams_r_asset_library` AS ALS ON UR.AL_ID = ALS.AL_ID WHERE URS.URS_ID = $ids GROUP BY URS.URS_ID ORDER BY URS.URS_APPROVED_DATE DESC";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {                              
                                $urspurpose = $row['URS_PURPOSE'];
                                $ursno = $row['URS_NO'];
                                $ursdatereq = $row['URS_REQUEST_DATE'];
                                $ursreqby = $row['O_NAME'];
                                $ursid = $row['URS_ID'];
                                $mainstat = $row['URSTM_STATUS_TO_MAIN'];   
                        ?>
                            <label>Request To: </label> <u>PUP MAIN</u> <br>
                            <label>Requested By: </label> <u>PUP Quezon City</u> <br>
                            <label>Date: </label> <u> <?php echo $ursdatereq; ?> </u> <br>
                            <label>REQUEST NO: </label> <u> <?php echo $ursno; ?> </u> <br> <br>
                            <label>PURPOSE: </label> <u> <?php echo $urspurpose; ?> </u> 

                        <?php
                            }
                        ?>
                            <br>
                            <br>
                            <table class="display table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Request</th>
                                        <th style="width: 150px;">Unit</th>
                                        <th style="width: 150px;">Quantity</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php  
                                    $sql1 = "SELECT URS.URS_PURPOSE, URS.URS_NO, URS.URS_ID, URS.URS_REQUEST_DATE, O.O_NAME, URSTM.URSTM_STATUS_TO_MAIN, UR.UR_UNIT, URABPO.URA_QUANTITY, ALS.AL_NAME FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request_status_to_main` AS URSTM ON URSTM.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_t_user_request_approved_by_po` AS URABPO ON URABPO.UR_ID = UR.UR_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID INNER JOIN `ams_r_asset_library` AS ALS ON UR.AL_ID = ALS.AL_ID WHERE URS.URS_ID = $ids ORDER BY URS.URS_APPROVED_DATE DESC";

                                    $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                    while($row1 = mysqli_fetch_assoc($result1))
                                    {
                                        $requestname = $row1['AL_NAME'];
                                        $requestunit = $row1['UR_UNIT'];
                                        $requestqty = $row1['URA_QUANTITY'];
                                ?>

                                    <tr>
                                        <td> <?php echo $requestname; ?> </td>
                                        <td> <?php echo $requestunit; ?> </td>
                                        <td> <?php echo $requestqty; ?> </td>
                                    </tr>

                                <?php
                                    }
                                ?>

                                </tbody>
                            </table>

                            <br>
                            <br>
                            <br>
                            <span class="pull-right">
                                <label>Approved By: </label> <u> <?php echo $_SESSION['mysesi']; ?> </u> <br>
                            </span>
                            <br>                            
                            <span class="pull-right" style="margin-right: -140px;">
                                <label> <?php echo $_SESSION['mytype']; ?> </label>
                            </span>
                            
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

    <script>

        function printonly() {

            var restorepage = document.body.innerHTML;
            var printcont = document.getElementById('printdisbook').innerHTML;
            document.body.innerHTML = printcont;
            window.print();
            document.body.innerHTML = restorepage;

                setTimeout(function() 
                {
                    window.location = window.location;
                }, 100);

        }

    </script>

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
     
    $(document).on('click', '.dropdown-toggle', function() {
        $('.count').html('');
        load_unseen_notification('yes');
    });
     
    setInterval(function(){ 
        load_unseen_notification();; 
    }, 1000);
 
});
</script>