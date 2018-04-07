<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";
    }

?>

<!DOCTYPE html>
<html>

<head>

    <link href="../../bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="../../css/bootstrap-reset.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="../../css/clndr.css" rel="stylesheet">
    <link href="../../js/css3clock/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../js/morris-chart/morris.css">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style-responsive.css" rel="stylesheet" />
    <link href="../../js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="../../js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../js/data-tables/DT_bootstrap.css" />
    <link href="../../js/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style-responsive.css" rel="stylesheet" />
    <title>Disposal</title>
    <link rel="icon" href="../../images/PUPLogo.png" sizes="32x32">

</head>

<body>

    <section id="container">

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

                            <span class="username" id="getthenameofuser"> <?php echo $_SESSION['mysesi']; ?></span>
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
                            <a href="javascript:;">
                                <i class="fa fa-wrench"></i>
                                <span>Maintenance</span>
                            </a>
                            <ul class="sub">
                                <li><a href="POMaintenanceInsCheck.php">Inspection/Checking</a></li>
                                <li><a href="POMaintenanceReport.php">Report Of Damage</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active" href="PODisposal.php">
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

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->

                <div class="row">
                    <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="PODashboard.php"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="POTransferAsset.php">Transfer Asset</a></li>
                        </ul>
                        <!--breadcrumbs end -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">

                                    <!-- <div class="clearfix">
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                            </button>

                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#">Print</a></li>
                                                <li><a href="#">Save as PDF</a></li>
                                                <li><a href="#">Export to Excel</a></li>
                                            </ul>
                                        </div>
                                    </div> -->

                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        
                                        <?php
                                            include('../Connection/db.php');
                                        ?>

                                            <thead>
                                                <tr>
                                                    <th style="" class="hidden">ID</th>
                                                    <th style="width: 90px;"></th>
                                                    <!-- <th style="width: 140px;">Acquisition Type</th> -->
                                                    <th style="width: 100px;">Status</th>
                                                    <th style="word-wrap: break-word">Description</th>
                                                    <!-- <th style="width: 130px;">Date Acquired</th> -->
                                                    <th class="hidden"></th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php  

                                                    $sql = "SELECT * FROM `ams_r_asset` WHERE A_STATUS = 'For Disposal' OR A_STATUS = 'Disposed' ORDER BY A_DATE DESC";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    $i = 0;

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $i++;                                
                                                        $a_id = $row['A_ID'];
                                                        $a_description = $row['A_DESCRIPTION'];    
                                                        // $a_acquistion_type = $row['A_ACQUISITION_TYPE'];                           
                                                        $a_date = $row['A_DATE'];
                                                        $a_status = $row['A_STATUS'];
                                                        $a_availability = $row['A_AVAILABILITY'];
                                                ?>

                                                <tr class="gradeX">

                                                    <td class="hidden">
                                                        <a id="getid<?php echo $i; ?>">
                                                            <?php echo $a_id; ?>
                                                        </a>
                                                    </td>

                                                    <?php  
                                                        if ($a_status == 'For Disposal') 
                                                        {
                                                    ?>

                                                    <td>
                                                        <center>
                                                            <input type="checkbox" id="<?php echo $i; ?>" class="checkbox form-control ckthis" style="width: 20px">
                                                        </center>
                                                    </td>

                                                    <!-- <td id="origtype<?php echo $i; ?>">
                                                        <?php echo $a_acquistion_type; ?> </td> -->
                                                    <td id="origstat<?php echo $i; ?>">
                                                        <p class="label label-danger label-mini" style="font-size: 11px;"> <?php echo $a_status; ?> </p> </td>
                                                    <td id="origdesc<?php echo $i; ?>">
                                                        <?php echo $a_description; ?> </td>
                                                    <!-- <td id="origdate<?php echo $i; ?>">
                                                        <?php echo $a_date; ?> </td> -->
                                                    <td class="hidden">1</td>

                                                    <?php  
                                                        }
                                                        else if($a_status == 'Disposed')
                                                        {
                                                    ?>

                                                    <td>
                                                        <center>
                                                            <input type="checkbox" id="<?php echo $i; ?>" class="checkbox form-control ckthis" style="width: 20px" disabled>
                                                        </center>
                                                    </td>

                                                    <!-- <td id="origtype<?php echo $i; ?>">
                                                        <?php echo $a_acquistion_type; ?> </td> -->
                                                    <td id="origstat<?php echo $i; ?>">
                                                        <p class="label label-default label-mini" style="font-size: 11px;"> <?php echo $a_status; ?> </p> </td>
                                                    <td id="origdesc<?php echo $i; ?>">
                                                        <?php echo $a_description; ?> </td>
                                                   <!--  <td id="origdate<?php echo $i; ?>">
                                                        <?php echo $a_date; ?> </td> -->
                                                    <td class="hidden">2</td>

                                                    <?php
                                                        }
                                                    ?>

                                                </tr>

                                                <?php 
                                                    }
                                                ?>

                                                <?php
                                                    $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_r_asset` WHERE A_STATUS = 'For Disposal' OR A_STATUS = 'Disposed'";

                                                    $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                    while($row1 = mysqli_fetch_assoc($result1))
                                                    {
                                                        $cnt = $row1['AAA'];
                                                        echo '<input type="text" class="hidden" id="getcount" value="'.$i.'" />';
                                                    }
                                                ?>

                                                    <a class="btn btn-success" id="assignbtn2">Dispose</a>

                                                    <a class="btn btn-success hidden" id="assignbtn" data-toggle="modal" href="#ModalAssign">Transfer</a>

                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div id="clone" style="display: none;">
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="adv-table editable-table ">
                                        <div class="clearfix">

                                            <div class="btn-group pull-right">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                                </button>

                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="#">Print</a></li>
                                                    <li><a href="#">Save as PDF</a></li>
                                                    <li><a href="#">Export to Excel</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                            
                                        <?php                       
                                            include('../Connection/db.php');                                    
                                        ?>
                                            <thead>
                                                <tr>
                                                    <th style="width: 70px;">ID</th>
                                                    <th style="width: 90px">Select</th>
                                                    <!-- <th style="width: 140px;">Acquisition Type</th> -->
                                                    <th style="width: 100px;">Status</th>
                                                    <th style="word-wrap: break-word;">Description</th>
                                                    <!-- <th style="width: 130px;">Date Acquired</th> -->
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php  

                                                $sql = "SELECT * FROM `ams_r_asset` WHERE A_STATUS = 'For Disposal' OR A_STATUS = 'Disposed' ORDER BY A_DATE DESC";

                                                $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                $i = 0;

                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $i++;                                
                                                    $a_id = $row['A_ID'];
                                                    $a_description = $row['A_DESCRIPTION'];    
                                                    $a_acquistion_type = $row['A_ACQUISITION_TYPE'];                           
                                                    $a_date = $row['A_DATE'];
                                                    $a_status = $row['A_STATUS'];
                                                    $a_availability = $row['A_AVAILABILITY'];
                                            ?>

                                                <tr class="gradeX">
                                                    <td>
                                                        <a id="getids<?php echo $i; ?>">
                                                            <?php echo $a_id; ?>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <center>
                                                            <input type="checkbox" id="chkvalsz<?php echo $i; ?>" class="checkbox form-control " style="width: 20px">
                                                        </center>
                                                    </td>                                                

                                                    <!-- <td id="origtypes<?php echo $i; ?>">
                                                        <?php echo $a_acquistion_type; ?> </td> -->
                                                    <td id="origstats<?php echo $i; ?>">
                                                        <?php echo $a_status; ?> </td>
                                                    <td id="origdescs<?php echo $i; ?>">
                                                        <?php echo $a_description; ?> </td>
                                                    <!-- <td id="origdates<?php echo $i; ?>">
                                                        <?php echo $a_date; ?> </td> -->
                                                </tr>

                                            <?php 
                                                }
                                            ?>

                                            <?php
                                                $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_r_asset` WHERE A_STATUS = 'For Disposal' OR A_STATUS = 'Disposed'";

                                                $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                while($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                    $cnt = $row1['AAA'];
                                                    echo '<input type="text" class="hidden" id="getcount" value="'.$i.'" />';
                                                }
                                            ?>

                                                    <a class="btn btn-success" id="assignbtn" data-toggle="modal" href="#ModalAssign">Assign</a>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <!-- page end-->
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

    <!-- modal -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="../../js/jquery.js"></script>
    <script src="../../bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="../../js/jquery.nicescroll.js"></script>1
    <!--Easy Pie Chart-->
    <script src="../../js/easypiechart/jquery.easypiechart.js"></script>
    <!--Sparkline Chart-->
    <script src="../../js/sparkline/jquery.sparkline.js"></script>
    <!--jQuery Flot Chart-->
    <script src="../../js/flot-chart/jquery.flot.js"></script>
    <script src="../../js/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="../../js/flot-chart/jquery.flot.resize.js"></script>
    <script src="../../js/flot-chart/jquery.flot.pie.resize.js"></script>

    <script type="text/javascript" src="../../js/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../js/data-tables/DT_bootstrap.js"></script>

    <script src="../../js/dynamic_table_init.js"></script>

    <!--common script init for all pages-->
    <script src="../../js/scripts.js"></script>

    <!--script for this page only-->
    <script src="PODisposal/OrganizationCompliance.js"></script>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalAssign" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Dispose an asset</h4>
                </div>

                <div class="modal-body">

                    <form role="form" method="POST" id="form-data3">
                        <div class="form-group">
                            <div class="adv-table">
                                <input type="hidden" id="passdisposedby" value="<?php echo $_SESSION['mysesi']; ?>">
                                <table class="display table table-bordered table-striped" id="dynamic-table tblmodal">
                                    <thead>
                                        <tr>
                                            <th class="hidden">ID</th>
                                            <th style="width: 100px;">Status</th>
                                            <th style="word-wrap: break-word;">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody id="newmodalget">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row group">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select disposal type</label>
                                        <select class="form-control m-bot15" id="passdisposetype" style="color: black; padding-left: 10px;" required>

                                            <option value="" selected disabled></option>
                                            <option value="Keep">Keep</option>
                                            <option value="Return">Return</option>
                                        
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-8 hidden" id="disploc">
                                    <div class="form-group">
                                        <label>Disposal Location</label>
                                        <select class="form-control m-bot15" id="passlocation" style="color: black; padding-left: 10px;" required>

                                            <option value="" selected disabled></option>

                                            <?php  

                                                $sqlforemployee = "SELECT * FROM ams_r_disposal_location";

                                                $results = mysqli_query($connection, $sqlforemployee) or die("Bad Query: $sql");

                                                while($row = mysqli_fetch_assoc($results))
                                                {
                                                    $dlid = $row['DL_ID'];
                                                    $dlname = $row['DL_CODE'];

                                            ?>

                                            <option value="<?php echo $dlid ?>"><?php echo "$dlname"; ?></option>
                                            
                                            <?php
                                                }
                                            ?>
                                        
                                        </select>
                                    </div>             
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea style="color: black; word-wrap: break-word; resize: none; height: 85px;" class="form-control" maxlength="200" id="passremarks" required=""></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Date of Disposal</label>
                                <input style="color: black;" type="date" id="passdate" class="form-control" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" id="btnsend" type="button">Dispose</button>
                    <button data-dismiss="modal" class="btn btn-default" id="ggss" type="button">Close</button>

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="../../js/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#passdisposetype').change(function() {
                var e = document.getElementById("passdisposetype");
                var getcat = e.options[e.selectedIndex].text;
                if (getcat == 'Keep')
                    $('#disploc').removeClass('hidden');
                else
                    $('#disploc').addClass('hidden');


            });

            $('#assignbtn2').click(function() {

                var getthecnt = document.getElementById('getcount').value;
                var ck = '';
                var filltable = '';
                var noofchecked = 0;

                for (var z = getthecnt; z > 0; z--) {

                    var ck = 'chkvalsz' + z;
                    if (document.getElementById(ck).checked) {
                        var idz = document.getElementById('getids' + z).innerText;
                        var statz = document.getElementById('origstats' + z).innerText;
                        var descz = document.getElementById('origdescs' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td>' + statz + '</td><td>' + descz + '</td></tr>';
                        noofchecked = noofchecked + 1;
                        
                    }
                    document.getElementById('newmodalget').innerHTML = filltable;                    
                }
                // alert(noofchecked);

                if (noofchecked == 0) 
                {
                    // alert('tago');
                    swal("Please select atleast one item/asset.", "To dispose item/asset please select atleast one.", "warning");
                }
                else
                {
                    // alert('labas modal');
                    $('#assignbtn').click();
                }

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#assignbtn').click(function() {

                var getthecnt = document.getElementById('getcount').value;
                var ck = '';
                var filltable = '';

                for (var z = getthecnt; z > 0; z--) {

                    var ck = 'chkvalsz' + z;
                    if (document.getElementById(ck).checked) {
                        var idz = document.getElementById('getids' + z).innerText;
                        var statz = document.getElementById('origstats' + z).innerText;
                        var descz = document.getElementById('origdescs' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td>' + statz + '</td><td>' + descz + '</td></tr>';
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
                } 
                else 
                {
                    var e = document.getElementById('chkvalsz' + this.id).checked
                    document.getElementById('chkvalsz' + this.id).checked = false;
                }
            });            

            $('#btnsend').click(function(e) {
                
                var ddate = document.getElementById('passdate').value;
                // alert(ddate+' = date');

                var dtype = document.getElementById('passdisposetype');
                var origdtype = dtype.options[dtype.selectedIndex].innerText;
                // alert(origdtype+' = disposal type');

                var dremarks = document.getElementById('passremarks').value;
                // alert(dremarks+' = remakrs');

                var ddisposedby = document.getElementById('passdisposedby').value;
                // alert(ddisposedby+' = disposed by');

                var ddlid = document.getElementById('passlocation');
                var origddlid = ddlid.options[ddlid.selectedIndex].value;        
                // alert(origddlid+' = dl id');

                if (origdtype == 'Keep') 
                {
                    swal({

                        title: "Are you sure you want to dispose this/these asset?",
                        text: "The selected asset will dispose.",
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

                            $('#newmodalget tr').each(function(index, val) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'InsertToDisposal.php',
                                    async: false,
                                    data: {
                                        _ddate: ddate,
                                        _origdtype: origdtype,
                                        _dremarks: dremarks,
                                        _ddisposedby: ddisposedby,
                                        _origddlid: origddlid,
                                        _daid: $(this).closest('tr').children('td:first').text()
                                    },
                                    success: function(data2) {
                                        alert(data2); 
                                        swal("Asset Successfully Disposed!", "The selected asset is disposed.", "success");

                                        setTimeout(function() 
                                        {
                                            window.location=window.location;
                                        },2500); 
                                    },
                                    error: function(response2) {
                                        alert(response2);      

                                        swal("Error", "May mali bry eh!", "error");                              
                                    }

                                });
                            });
                            
                        }
                        else
                        {
                            swal("Cancelled", "The confirmation of request to main is cancelled", "error");
                        }

                    });
                }
                else if (origdtype == 'Return') 
                {
                    swal({

                        title: "Are you sure you want to dispose this/these asset?",
                        text: "The selected asset will dispose.",
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

                            $('#newmodalget tr').each(function(index, val) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'InsertToDisposal.php',
                                    async: false,
                                    data: {
                                        _ddate: ddate,
                                        _origdtype: origdtype,
                                        _dremarks: dremarks,
                                        _ddisposedby: ddisposedby,
                                        _origddlid: 'NULL',
                                        _daid: $(this).closest('tr').children('td:first').text()
                                    },
                                    success: function(data2) {
                                        alert(data2); 
                                        swal("Asset Successfully Disposed!", "The selected asset is disposed.", "success");

                                        setTimeout(function() 
                                        {
                                            window.location=window.location;
                                        },2500); 
                                    },
                                    error: function(response2) {
                                        alert(response2);      

                                        swal("Error", "May mali bry eh!", "error");                              
                                    }

                                });
                            });
                            
                        }
                        else
                        {
                            swal("Cancelled", "The confirmation of request to main is cancelled", "error");
                        }

                    });
                }

                

            });

        });

        jQuery(document).ready(function() {
            initproftable.init();
            EditableTable.init();
        });

    </script>

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

        $(document).ready(function() {

            function load_unseen_notification(view = '') {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        view: view
                    },
                    dataType: "json",
                    success: function(data) {
                        $('.dispnotif').html(data.notification);
                        if (data.unseen_notification > 0) {
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

            setInterval(function() {
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

</body>

</html>
