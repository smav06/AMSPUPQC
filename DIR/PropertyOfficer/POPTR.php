<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser'])  && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css" media="print">
        @media print
          {
             @page {
               margin-top: 0;
               margin-bottom: 0;
             }
             body  {
               padding-top: 72px;
               padding-bottom: 72px ;
             }
          } 
    </style>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="../../images/favicon.png">

    <title>PTR</title>

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
                        <li><a href="POAsset.php">Assets</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Property Transfer Report
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                            </span>
                        </header>                        

                        <?php
                            $sql = "SELECT MAX(PTR_ID) AS AAA FROM `ams_t_transfer_out_ptr`";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                                $maxptrid = $row['AAA'];
                                echo '<input type="text" class="hidden" id="maxptrid" value="'.$maxptrid.'" />';
                            }
                        ?>

                        <?php  
                            $sql = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_transfer_out_ptr_sub AS PTRS ON PTRS.A_ID = A.A_ID INNER JOIN ams_t_transfer_out_ptr AS PTR ON PTRS.PTR_ID = PTR.PTR_ID INNER JOIN ams_r_campus AS C ON PTR.C_ID = C.C_ID WHERE PTR.PTR_ID = $maxptrid GROUP BY PTR.PTR_ID";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {                              
                              $ptrno = $row['PTR_NO'];
                              $ptrdate = $row['PTR_DATE'];
                              $receivedby = $row['PTR_RECEIVED_BY'];
                              $reason = $row['PTR_REMARKS'];
                              $transferredby = $row['PTR_TRANSFERRED_BY'];
                              $transferto = $row['C_NAME'];
                              $transfertocode = $row['C_CODE'];

                        ?>

                        <div class="panel-body">
                            <div class="row group">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PTR No.</label>
                                        <input type="text" value="<?php echo $ptrno; ?>" class="form-control" style="color: black;" disabled  />
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Transfer To</label>
                                        <input type="text" value="<?php echo $transferto; ?> (<?php echo $transfertocode; ?>)" class="form-control" style="color: black;" disabled  />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" value="<?php echo $ptrdate; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Transfer From</label>
                                        <input type="text" value="Polytechnic University of the Philippines Quezon City (PUP QC)" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Receiver</label>
                                        <input type="text" value="<?php echo $receivedby; ?>" class="form-control" style="color: black;" disabled />
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Transfer By</label>
                                        <input type="text" value="<?php echo $transferredby; ?>" class="form-control" style="color: black;" disabled />
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
                                    <div class="adv-table">
                                        <table class="display table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Assets</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php  
                                                $sql1 = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_transfer_out_ptr_sub AS PTRS ON PTRS.A_ID = A.A_ID INNER JOIN ams_t_transfer_out_ptr AS PTR ON PTRS.PTR_ID = PTR.PTR_ID INNER JOIN ams_r_campus AS C ON PTR.C_ID = C.C_ID WHERE PTR.PTR_ID = $maxptrid";

                                                $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                while($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                    $adesc = $row1['A_DESCRIPTION'];
                                            ?>
                                                <tr>
                                                    <td> <?php echo $adesc; ?> </td>
                                                </tr>

                                            <?php
                                                }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <span class="pull-right">
                                <button type="button" class="btn btn-success" onclick="printonly()"><i class="fa fa-print"> PRINT</i></button>
                            </span>
                            
                        </div>


                        
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
                            <center><h6>PROPERTY TRANSFER REPORT (PTR)</h6></center>
                            <br>
                            <br>
                            <br>  
                            <br>
                            <br>
                            <br>
                            <br>                      

                        <?php 
                            $sql = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_transfer_out_ptr_sub AS PTRS ON PTRS.A_ID = A.A_ID INNER JOIN ams_t_transfer_out_ptr AS PTR ON PTRS.PTR_ID = PTR.PTR_ID INNER JOIN ams_r_campus AS C ON PTR.C_ID = C.C_ID WHERE PTR.PTR_ID = $maxptrid GROUP BY PTR.PTR_ID";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {                              
                              $ptrno = $row['PTR_NO'];
                              $ptrdate = $row['PTR_DATE'];
                              $receivedby = $row['PTR_RECEIVED_BY'];
                              $reason = $row['PTR_REMARKS'];
                              $transferredby = $row['PTR_TRANSFERRED_BY'];
                              $transferto = $row['C_NAME'];
                              $transfertocode = $row['C_CODE'];
                        ?>

                            <label>Date: </label> <u> <?php echo $ptrdate; ?> </u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <label>Transfer From: </label> <u> PUP QC </u>  
                            <br>
                            <label>PTR NO: </label> <u> <?php echo $ptrno; ?> </u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <label>Transfer To: </label> <u> <?php echo $transfertocode; ?> </u>
                            <br>
                            <label>Receiver: </label> <u> <?php echo $receivedby; ?> </u>
                            <br>
                            <br>
                            <label>Reason For Transfer: </label> <u> <?php echo $reason; ?> </u> 

                        <?php
                            }
                        ?>
                            <br>
                            <br>
                            <br>
                            <br>
                            <table class="display table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Asset</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php  
                                    $sql1 = "SELECT * FROM ams_r_asset AS A INNER JOIN ams_t_transfer_out_ptr_sub AS PTRS ON PTRS.A_ID = A.A_ID INNER JOIN ams_t_transfer_out_ptr AS PTR ON PTRS.PTR_ID = PTR.PTR_ID INNER JOIN ams_r_campus AS C ON PTR.C_ID = C.C_ID WHERE PTR.PTR_ID = $maxptrid";

                                    $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                    while($row1 = mysqli_fetch_assoc($result1))
                                    {
                                        $adesc = $row1['A_DESCRIPTION'];
                                ?>

                                    <tr>
                                        <td> <?php echo $adesc; ?> </td>
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
                                <label>Transfer By: </label> <u> <?php echo $transferredby; ?> </u> <br>
                            </span>
                            <br>                            
                            <span class="pull-right" style="margin-right: -135px;">
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
<div class="right-sidebar" >
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

    <script src="../../js/jquery.multifield.min.js"></script>
    <script src="../../js/jquery.multifield.js"></script>

    <script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=place]').val($(this).val());            
            });
        });

    </script>    

</body>
</html>

<script>

$(document).ready(function(){

    // btnsubmitthedonation

    // $('#btnsubmitthedonation').click(function(e) {
    //     // alert();
    // });
 
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