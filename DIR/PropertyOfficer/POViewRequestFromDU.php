<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";

    }

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
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

    <title>Evaluate Request</title>

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
            <ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 330px;">
            </ul>
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
                    <a href="javascript:;" class="active">
                        <i class="fa fa-comment-o"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a href="PODURequests.php">Departmental User Requests</a></li>
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
                        <li><a href="PODURequests.php">Departmental User Requests</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: #FAFAFA;" class="panel-heading">
                            .
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>

                        <?php  
                            $sql = "SELECT * FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID WHERE URS.URS_ID = $ids GROUP BY URS.URS_ID";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {                              
                              $urspurpose = $row['URS_PURPOSE'];
                              $ursno = $row['URS_NO'];
                              $ursdatereq = $row['URS_REQUEST_DATE'];
                              $ursreqby = $row['O_NAME'];
                              $ursid = $row['URS_ID'];
                        ?>

                        <div class="panel-body">
                            <div class="row group">                                                        
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Request No.</label>
                                        <input type="hidden" id="pinakaursid" value="<?php echo $ursid; ?>">
                                        <input type="text" value="<?php echo $ursno; ?>" class="form-control" style="color: black;" disabled  />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Requested By</label>
                                        <input type="text" value="<?php echo $ursreqby; ?>" class="form-control" style="color: black;" disabled  />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Requested</label>
                                        <input type="Date" value="<?php echo $ursdatereq; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <!-- <input type='text' id="chatinput" onkeyup="myFunction()">

                                <input type='text' id="chatdisplay"> -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Purpose</label>
                                        <input type="text" value="<?php echo $urspurpose; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                        <?php
                            }
                        ?>

                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Requests</label>
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">UR ID</th>
                                                    <th style="width: 55px;">Approved?</th>
                                                    <th>Request</th>
                                                    <th style="width: 85px;">Unit</th> 
                                                    <th style="width: 80px;">Quantity</th>
                                                    <th style="width: 130px;">Quantity Approved</th>
                                                    <th style="width: 250px;">Requesting Person</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT UR.UR_ID, URS.URS_ID, URS.URS_NO, AL.AL_NAME, UR.UR_UNIT, UR.UR_QUANTITY, EP.EP_FNAME, EP.EP_MNAME, EP.EP_LNAME FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID INNER JOIN `ams_r_asset_library` AS AL ON UR.AL_ID = AL.AL_ID WHERE URS.URS_ID = $ids ORDER BY UR.UR_ID ASC";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    $i = 0;

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $i++;  

                                                        $showurid = $row['UR_ID'];
                                                        $showlibname = $row['AL_NAME'];
                                                        $showunit = $row['UR_UNIT'];
                                                        $showqty = $row['UR_QUANTITY'];

                                                        $showfname = $row['EP_FNAME'];
                                                        $showmname = $row['EP_FNAME'];
                                                        $showlname = $row['EP_LNAME'];

                                                        $showreqperson = $showfname.' '.$showmname.' '.$showlname;
                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none;"> <?php echo $showurid; ?> </td>
                                                    <td> 
                                                        <center> <input type="checkbox" id="<?php echo $i; ?>" class="checkbox form-control ckthis" style="width: 20px;" checked="true"> </center>
                                                    </td>
                                                    <td> <?php echo $showlibname; ?> </td>
                                                    <td> <?php echo $showunit; ?> </td>
                                                    <td> <p> <?php echo $showqty; ?> </p> </td>

                                                    <?php  
                                                        if ($showqty > 1) 
                                                        {
                                                    ?>
                                                        <td> <center> <input type="text" value="" class="form-control" style="color: black;" onkeyup="myFunction()" id="chatinput<?php echo $i; ?>" required> </center> </td>
                                                    <?php
                                                        }
                                                        elseif ($showqty = 1) 
                                                        {
                                                    ?>

                                                        <td> <center> <input type="text" value="" class="form-control" style="color: black;" onkeyup="myFunction()" id="chatinput<?php echo $i; ?>" required disabled> </center> </td>

                                                    <?php
                                                        }
                                                    ?>                                                    

                                                    <td> <?php echo $showreqperson; ?> </td>
                                                </tr>

                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_t_user_request` WHERE URS_ID = $ids";

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

                                <!-- CLONE -->
                                <div class="col-md-12 hidden" id="clone">
                                    <label>Requests</label>
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">UR ID</th>
                                                    <th style="width: 55px;">Approved?</th>
                                                    <th>Request</th>
                                                    <th style="width: 85px;">Unit</th> 
                                                    <th style="width: 80px;">Quantity</th>
                                                    <th style="width: 130px;">Modified Quantity</th>
                                                    <th style="width: 250px;">Requesting Person</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT UR.UR_ID, URS.URS_ID, URS.URS_NO, AL.AL_NAME, UR.UR_UNIT, UR.UR_QUANTITY, EP.EP_FNAME, EP.EP_MNAME, EP.EP_LNAME FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID INNER JOIN `ams_r_asset_library` AS AL ON UR.AL_ID = AL.AL_ID WHERE URS.URS_ID = $ids ORDER BY UR.UR_ID ASC";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    $i = 0;

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $i++;  

                                                        $showurid = $row['UR_ID'];
                                                        $showlibname = $row['AL_NAME'];
                                                        $showunit = $row['UR_UNIT'];
                                                        $showqty = $row['UR_QUANTITY'];

                                                        $showfname = $row['EP_FNAME'];
                                                        $showmname = $row['EP_FNAME'];
                                                        $showlname = $row['EP_LNAME'];

                                                        $showreqperson = $showfname.' '.$showmname.' '.$showlname;
                                                ?>

                                                <tr class="gradeX">
                                                    <td id="origid<?php echo $i; ?>" style="display: none;"> <?php echo $showurid; ?> </td>
                                                    <td> 
                                                        <center> <input type="checkbox" class="checkbox form-control" style="width: 20px;" checked="true" id="chkvalsz<?php echo $i; ?>"> </center>
                                                    </td>
                                                    <td id="origreq<?php echo $i; ?>"> <?php echo $showlibname; ?> </td>
                                                    <td id="origunit<?php echo $i; ?>"> <?php echo $showunit; ?> </td>
                                                    <td id="origqty<?php echo $i; ?>"> <p id="chatdisplays<?php echo $i; ?>"> <?php echo $showqty; ?> </p> </td>
                                                    <td> <center> <input type="text" value="<?php echo $showqty; ?>" min="1" max="<?php echo $showqty; ?>" class="form-control" style="color: black;" onkeyup="myFunction()" id="chatinput<?php echo $i; ?>"> </center> </td>
                                                    <td> <?php echo $showreqperson; ?> </td>
                                                </tr>

                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_t_user_request` WHERE URS_ID = $ids";

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

                                <!-- CLONE END -->

                                <div class="col-md-12 hidden" id="clone">
                                    <label>Requests</label>
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="">UR ID</th>
                                                    <th>Request</th>
                                                    <th style="width: 85px;">Unit</th> 
                                                    <th style="width: 80px;">Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody id="newmodalget">                                                 

                                            </tbody>                                            
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; ">                                                             
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">                                                             
                                    </div>
                                </div>
                            </div>

                            <div class="row group">                                                        
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Remarks</label> 
                                        <textarea name="viewrequestsevaluate" id="viewrequestsevaluate" class="form-control" style="resize: none; color: black; height: 85px;" maxlength="200"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Evaluation</label>
                                        <select class="form-control" style="color: black;" id="getsel">
                                            <option selected disabled value=""></option>
                                            <option value="Approved">Approve Request</option>
                                            <option value="Reject">Reject Request</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <a href="PODURequests.php" class="btn btn-default">Cancel</a>
                                        <a id="btnevaluate" class="btn btn-success">Submit</a>                                        
                                    </div>
                                </div>
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

function myFunction() {

    var getthecnt = document.getElementById('getcount').value;

    for (var z = getthecnt; z > 0; z--) 
    {
        var ck = 'chkvalsz' + z;

        if (document.getElementById(ck).checked) 
        {
            var x = document.getElementById("chatinput"+z).value;
            document.getElementById("chatdisplays"+z).innerText = x;
        }
    }    

}

$(document).ready(function(){

    $('#btnevaluate').click(function() {

        var getthecnt = document.getElementById('getcount').value;
        var ck = '';
        var filltable = '';

        for (var z = getthecnt; z > 0; z--) {

            var ck = 'chkvalsz' + z;
            if (document.getElementById(ck).checked) {
                var idz = document.getElementById('origid' + z).innerText;
                var reqz = document.getElementById('origreq' + z).innerText;
                var unitz = document.getElementById('origunit' + z).innerText;
                var qtyz = document.getElementById('origqty' + z).innerText;
                filltable = filltable + '<tr><td class="">' + idz + '</td><td>' + reqz + '</td><td>' + unitz + '</td><td>' + qtyz + '</td></tr>';
            }
            document.getElementById('newmodalget').innerHTML = filltable;
        }

    });

    allNextBtn = $('.ckthis');

    allNextBtn.click(function() {
        if (this.checked) 
        {
            var e = document.getElementById('chkvalsz' + this.id).checked
            document.getElementById('chkvalsz' + this.id).checked = true;
            // document.getElementById('chkvalsz' + this.id).disabled = false;
            document.getElementById("chatinput" + this.id).disabled = false;            
        } 
        else 
        {
            var e = document.getElementById('chkvalsz' + this.id).checked
            document.getElementById('chkvalsz' + this.id).checked = false;
            // document.getElementById('chkvalsz' + this.id).disabled = true;
            document.getElementById("chatinput" + this.id).disabled = true;
            document.getElementById("chatinput" + this.id).value = "";
        }
    });


    $('#btnevaluate').click(function(e) {
                
        e.preventDefault();
        
        swal({
                title: "Are you sure you want to assign this asset?",
                text: "The selected assets will be assign to this employee.",
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

                    var ursid = document.getElementById('pinakaursid').value;

                    var e = document.getElementById('getsel');
                    var evals = e.options[e.selectedIndex].value;

                    var remarks = document.getElementById('viewrequestsevaluate').value;

                    $.ajax({
                        type: 'POST',
                        url: 'ApprovedRequest.php',
                        async: false,
                        data: {
                            _ursid: ursid,
                            _evals: evals,
                            _remarks: remarks
                        },
                        success: function(data2) {
                            //alert(data2);                                    
                        },
                        error: function(response2) {
                            //alert(response2);                                    
                        }

                    });

                    // $('#newmodalget tr').each(function(index, val) {

                    //     var ursid = document.getElementById('pinakaursid').value;

                    //     $.ajax({
                    //         type: 'POST',
                    //         url: 'ApprovedRequestSub.php',
                    //         async: false,
                    //         data: {
                    //             _urid: $(this).closest('tr').children('td:first').text(),
                    //             _aqty: $(this).closest('tr').children('td:first').next().next().next().text(),
                    //             _ursid: ursid
                    //         },
                    //         success: function(data2) {
                    //             alert(data2);

                    //             // swal("Asset Successfully Assigned!", "To view the Property Accountability Receipt (PAR) please click the Report page.", "success");

                    //             // setTimeout(function() 
                    //             // {
                    //             //     window.location=window.location;
                    //             // },2000);
                    //         },
                    //         error: function(response2) {
                    //             alert(response2);

                    //             // swal("Error", "May mali bry eh!", "error");
                    //         }

                    //     });
                    // });
                } 
                else
                {
                    swal("Cancelled", "The transaction is cancelled", "error");
                }

            });

    });

 function load_unseen_notification(view = '')
 {
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
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>