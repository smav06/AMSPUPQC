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
    <title>Inspection / Checking</title>
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
                            <a href="javascript:;" class="active">
                    <i class="fa fa-wrench"></i>
                    <span>Maintenance</span>
                </a>
                            <ul class="sub">
                                <li class="active"><a href="POMaintenanceInsCheck.php">Inspection/Checking</a></li>
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
                                <!-- <li><a href="PORod.php">Report Of Damage</a></li> -->
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
                            <li><a href="POMaintenanceInsCheck.php">Inspection / Checking</a></li>
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
                                                    <th style="width: 70px;" class="hidden">ID</th>
                                                    <th style="width: 90px"></th>
                                                    <!-- <th style="width: 90px"><center><input type="checkbox" id="chkallhehe" class="checkbox form-control" style="width: 20px"></center></th> -->
                                                    <th style="width: 140px;">Acquisition Type</th>
                                                    <th style="width: 100px;">Status</th>
                                                    <th style="word-wrap: break-word;">Description</th>
                                                    <th class="hidden">available</th>
                                                    <th style="width: 130px;">Date Acquired</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php  

                                                    $sql = "SELECT * FROM `ams_r_asset` WHERE A_AVAILABILITY = 'Available' AND A_STATUS = 'Serviceable' ORDER BY A_DATE DESC";

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

                                                    <td class="hidden">
                                                        <a id="getid<?php echo $i; ?>">
                                                            <?php echo $a_id; ?>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <center>
                                                            <input type="checkbox" id="<?php echo $i; ?>" class="checkbox form-control ckthis" style="width: 20px">
                                                        </center>
                                                    </td>

                                                    <td id="origtype<?php echo $i; ?>">
                                                        <?php echo $a_acquistion_type; ?> </td>
                                                    <td id="origstat<?php echo $i; ?>">
                                                        <p class="label label-success label-mini" style="font-size: 11px;"> <?php echo $a_availability; ?> </p> </td>
                                                    <td id="origdesc<?php echo $i; ?>">
                                                        <?php echo $a_description; ?> </td>
                                                    <td class="hidden">1</td>
                                                    <td id="origdate<?php echo $i; ?>">
                                                        <?php echo $a_date; ?> </td>

                                                </tr>

                                                <?php 
                                                    }
                                                ?>

                                                <?php
                                                    $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_r_asset`";

                                                    $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                    while($row1 = mysqli_fetch_assoc($result1))
                                                    {
                                                        $cnt = $row1['AAA'];
                                                        echo '<input type="text" class="hidden" id="getcount" value="'.$i.'" />';
                                                    }
                                                ?>

                                                    <a class="btn btn-success" id="assignbtn2">Inspect</a>

                                                    <a class="btn btn-success hidden" id="assignbtn" data-toggle="modal" href="#ModalAssign">Assign</a>

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
                                                    <th style="width: 140px;">Acquisition Type</th>
                                                    <th style="width: 100px;">Status</th>
                                                    <th style="word-wrap: break-word;">Description</th>
                                                    <th style="width: 130px;">Date Acquired</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php  

                                                $sql = "SELECT * FROM `ams_r_asset` WHERE A_AVAILABILITY = 'Available' AND A_STATUS = 'Serviceable' ORDER BY A_DATE DESC";

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

                                                <?php
                                                    if ($a_availability == 'Available') 
                                                    {
                                                ?>
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
                                                <?php
                                                    }
                                                    elseif ($a_availability == 'Assigned') 
                                                    {
                                                ?>

                                                        <td>
                                                            <a id="getids<?php echo $i; ?>">
                                                                <?php echo $a_id; ?>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <center>
                                                                <input type="checkbox" id="chkvalsz<?php echo $i; ?>" class="checkbox form-control " style="width: 20px;" disabled>
                                                            </center>
                                                        </td>

                                                <?php
                                                    }
                                                ?>

                                                        <td id="origtypes<?php echo $i; ?>">
                                                            <?php echo $a_acquistion_type; ?> </td>
                                                        <td id="origstats<?php echo $i; ?>">
                                                            <?php echo $a_status; ?> </td>
                                                        <td id="origdescs<?php echo $i; ?>">
                                                            <?php echo $a_description; ?> </td>
                                                        <td id="origdates<?php echo $i; ?>">
                                                            <?php echo $a_date; ?> </td>
                                                </tr>

                                            <?php 
                                                }
                                            ?>

                                            <?php
                                                $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_r_asset`";

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
    <script src="POMaintenanceInsCheck/OrganizationCompliance.js"></script>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalAssign" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Inspection/Checking of Asset</h4>
                </div>

                <div class="modal-body">

                    <form role="form" method="POST" id="form-data3">
                        <div class="form-group">
                            <div class="adv-table">
                                <table class="display table table-bordered table-striped" id="dynamic-table tblmodal">
                                    <thead>
                                        <tr>
                                            <th class="hidden">ID</th>
                                            <th style="width: 100px;" class="hidden">Status</th>
                                            <th style="word-wrap: break-word;">Description</th>
                                            <th style="width: 190px;">Inspection Result</th>
                                        </tr>
                                    </thead>
                                    <tbody id="newmodalget">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Assign To:</label>
                                <select class="form-control" style="color: black;" id="getsel">
                                <option value="" disabled selected></option>

                                <?php  

                                    $sqlforemployee = "SELECT *, EP.EP_ID FROM `ams_r_employee_profile` AS EP LEFT JOIN `ams_r_user` AS U ON U.EP_ID = EP.EP_ID WHERE EP.EP_STATUS = 'Active' AND U.U_ROLE_CODE != 'Administrator' OR EP.EP_STATUS = 'Active' AND U.U_ROLE_CODE IS NULL";

                                    $results = mysqli_query($connection, $sqlforemployee) or die("Bad Query: $sql");

                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        $fname = $row['EP_FNAME'];
                                        $mname = $row['EP_MNAME'];
                                        $lname = $row['EP_LNAME'];
                                        $wholename = $fname.' '.$mname.' '.$lname;
                                        $epid = $row['EP_ID'];

                                ?>

                                <option value="<?php echo $epid ?>"><?php echo "$wholename"; ?></option>
                                
                                <?php
                                    }
                                ?>

                            </select>
                            </div>

                            <div class="form-group">
                                <label>Date Assign:</label>
                                <input type="date" name="" id="getdate" class="form-control" style="color: black;">
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" id="btnsend" type="button">Submit</button>
                    <button data-dismiss="modal" class="btn btn-default" id="ggss" type="button">Close</button>

                </div>

            </div>
        </div>
    </div>

    <!-- END JAVASCRIPTS -->
    <script type="text/javascript" src="../../js/sweetalert/sweetalert.min.js"></script>

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
        $(document).ready(function() {

            // $('#chkallhehe').click(function() {
            //     alert();
            //     if (document.getElementById('chkallhehe').checked) 
            //     {
            //         document.getElementById('9').checked = true;
            //     }
            // });

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
                        var datez = document.getElementById('origdates' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td class="hidden">' + statz + '</td><td>' + descz + '</td></tr>';
                        noofchecked = noofchecked + 1;
                        
                    }
                    document.getElementById('newmodalget').innerHTML = filltable;                    
                }
                // alert(noofchecked);

                if (noofchecked == 0) 
                {
                    // alert('tago');
                    swal("Please select atleast one item/asset.", "To inspect/check asset please select atleast one.", "warning");
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

            $('#ggss').click(function() {                                
                // document.getElementById('getsel').selectedIndex = "0";
                // document.getElementById('getdate').value = "";
            });

            $('#assignbtn').click(function() {

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
                        var datez = document.getElementById('origdates' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td class="hidden">' + statz + '</td><td>' + descz + '</td><td>'
                        +'<select class="form-control" style="color: black;" id="getselects" required>'+
                        '<option value="" disabled selected></option>'+
                        '<option value="For Repair">For Repair</option>'+
                        '<option value="For Disposal">For Disposal</option>'+
                        '</select>'
                        +'</td></tr>';
                        noofchecked = noofchecked + 1;                        
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

            $('#getsel').click(function(e) {
                document.getElementById('getsel').options[0].innerText = "";
                document.getElementById('getsel').style.borderColor = "#00A8B3";
                document.getElementById('getsel').style.color = "black";
            });

            $('#getsel').blur(function(e) {
                document.getElementById('getsel').options[0].innerText = "";
                document.getElementById('getsel').style.borderColor = "#E2E2E4";
                document.getElementById('getsel').style.color = "black";
            });

            $('#getdate').click(function(e) {
                document.getElementById('getdate').style.borderColor = "#00A8B3";
                document.getElementById('getdate').style.color = "black";

            });

            $('#getdate').blur(function(e) {
                document.getElementById('getdate').style.borderColor = "#E2E2E4";
                document.getElementById('getdate').style.color = "black";
            });

            $('#btnsend').click(function(e) {
                
                e.preventDefault();

                if (document.getElementById('getselects').value == "") 
                {
                    document.getElementById('getselects').focus();
                }
                else
                {
                    swal({
                            title: "Are you sure you want to submit this inspection result?",
                            text: "The result of inspection will be recorded.",
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

                                var tdObject = $(this).find('td:eq(3)'); //locate the <td> holding select;
                                var selectObject = tdObject.find("select"); //grab the <select> tag assuming that there will be only single select box within that <td> 
                                var selCntry = selectObject.val(); // get the selected country from current <tr>

                                // alert(selCntry);
                                $.ajax({
                                    type: 'POST',
                                    url: 'UpdateTheAssetBaseOnInspection.php',
                                    async: false,
                                    data: {
                                        _aid: $(this).closest('tr').children('td:first').text(),
                                        _inspectresult: selCntry
                                    },
                                    success: function(data2) {
                                        // alert(data2);

                                        swal("Inspection Result Submitted!", "The result of inspection/checking of asset successfully recorded.", "success");

                                        setTimeout(function() 
                                        {
                                            window.location=window.location;
                                            // window.location = 'POPAR.php';
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

            });

        });

        jQuery(document).ready(function() {
            initproftable.init();
            EditableTable.init();
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
