<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Departmental User' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
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
    
    <title>Requisition</title>

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
    <a href="DUDashboard.php" class="logo">
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
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

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

                <span class="username"> <?php echo $_SESSION['mysesi']; ?> </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="DUProfile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
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
                    <a href="DUDashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="DUDepartmentAsset.php">
                        <i class="fa fa-laptop"></i>
                        <span>Department Assets</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="active">
                        <i class="fa fa-comment-o"></i>
                        <span>Requisition</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a href="DURequest.php">Request</a></li>
                        <li><a href="DUPpmpRequest.php">PPMP Request</a></li>                  
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list"></i>
                        <span>Queries</span>
                    </a>
                    <ul class="sub">
                        <li><a href="DUReportDamagedAsset.php">Reported Damaged Asset</a></li>
                        <li><a href="DUReportForTransfer.php">Released Asset</a></li>                  
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
                    <li><a href="DUDashboard.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DURequest.php">Request</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Request asset
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                         <input type="text" id="officeid2" class="hidden" value="<?php echo $_SESSION['myoid']; ?>">
                    </header>
                    <!-- REMEMBER -->
                    <div class="panel-body"> 
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                            
                                        <form action="InsertDURequest.php" method="POST">

                                            <div class="form-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><button type="button" id="btnAdd" class="btn btn-primary">Add</button></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php  

                                                    include('../Connection/db.php');

                                                    $result = mysqli_query($connection, "SELECT MAX(URS_ID) FROM ams_t_user_request_summary");
                                                    $row = mysqli_fetch_array($result);

                                                    $last = $row[0];

                                                    $finalid = $last + 1;

                                                    echo '<input type="hidden" value="'.$finalid.'" name="getthefinalid">';


                                                    $result2 = mysqli_query($connection, "SELECT CONCAT( 'REQ-2018-', RIGHT( 10000 +( SELECT IFNULL( ( SELECT COUNT(*) FROM `ams_t_user_request_summary` ), 1 ) + 1 ), 4 ) ) AS GETROD");
                                                    $row2 = mysqli_fetch_array($result2);

                                                    $last2 = $row2['GETROD'];

                                                     echo '<input type="hidden" value="'.$last2.'" name="getthefinalno">';

                                                ?>

                                                <div class="form-group">
                                                    <label>Purpose Of Request</label>                                                    
                                                    
                                                    <textarea class="form-control" name="urs_purpose" required="" style="resize: none; color: black;" maxlength="200"></textarea>
                                                    
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row group">                                                        
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Asset</label>
                                                            <select name="AL_ID[]" class="form-control" style="color: black;" required="">

                                                           <!--  <select name="AL_ID[]" class="form-control" style="color: black;" onfocus='this.size=10;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required=""> -->

                                                                <option selected disabled value=""></option>

                                                            <?php  

                                                                $alibrary = "SELECT * FROM `ams_r_asset_library`";

                                                                $results = mysqli_query($connection, $alibrary) or die("Bad Query: $sql");

                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $libraryname = $row['AL_NAME'];
                                                                    $libraryid = $row['AL_ID'];

                                                            ?>

                                                                <option value="<?php echo $libraryid; ?>"><?php echo "$libraryname"; ?></option>

                                                            <?php 
                                                                } 
                                                            ?>

                                                            </select>

                                                            <!-- testing ko ng at_id -->

                                                            <!-- <label>Logic ko get epid ng nagrequest</label>
                                                            <input name="reqperson" value="" class="form-control" style="color: black;"/> -->

                                                        </div>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label>Unit</label>
                                                            <select name="UR_UNIT[]" class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>

                                                                <option value="Piece">Piece</option>

                                                                <option value="Set">Set</option>

                                                            </select>

                                                            <!-- <label>Logic ko sa unit</label>
                                                            <input name="place" value="" class="form-control" style="color: black;"/> -->

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input style="color: black; padding-right: 2px;" type="number" name="UR_QUANTITY[]" class="form-control" required="" minlength="3" min="1" max="100" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Request By</label>
                                                            <select name="EP_ID[]" class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>

                                                            <?php  

                                                                $getoffice = $_SESSION['myoid'];

                                                                $sqlforemployee = "SELECT * FROM `ams_r_employee_profile` WHERE O_ID = $getoffice";

                                                                $results = mysqli_query($connection, $sqlforemployee) or die("Bad Query: $sql");

                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $fname = $row['EP_FNAME'];
                                                                    $mname = $row['EP_MNAME'];
                                                                    $lname = $row['EP_LNAME'];
                                                                    $wholename = $fname.' '.$mname.' '.$lname;
                                                                    $epid = $row['EP_ID'];

                                                            ?>

                                                                <option value="<?php echo $epid; ?>"><?php echo "$wholename"; ?></option>

                                                            <?php 
                                                                } 
                                                            ?>

                                                            </select>

                                                            <!-- <label>Logic ko get epid ng nagrequest</label>
                                                            <input name="reqperson" value="" class="form-control" style="color: black;"/> -->

                                                        </div>
                                                    </div>

                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-danger btnRemove" style="margin-top: 23px;">Remove</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            
                                            <p><button type="submit" class="btn btn-success">Submit</button></p>

                                        </form>  
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Requests
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>

                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped classtbl" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th style="display: none;">URS ID</th>
                                        <th style="width: 130px;">Request No.</th>
                                        <th style="width: 130px;">Request Date</th> 
                                        <th style="">Purpose</th>
                                        <th style="width: 120px;">Status</th>
                                        <th style="width: 120px;" class="hidden"></th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php
                                    
                                    $getuseid = $_SESSION['myoid'];

                                    $retrievereqs = "SELECT URS.URS_ID, URS.URS_NO, URS.URS_REQUEST_DATE, URS.URS_PURPOSE, URS.URS_STATUS_TO_PO FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID WHERE EP.O_ID = $getuseid GROUP BY URS.URS_ID ORDER BY URS.URS_REQUEST_DATE DESC, URS.URS_ID DESC";

                                    $dispdata = mysqli_query($connection, $retrievereqs);

                                    while ($rowdispreq = mysqli_fetch_assoc($dispdata)) 
                                    {
                                        $ursdispid = $rowdispreq['URS_ID'];
                                        $ursdispno = $rowdispreq['URS_NO'];
                                        $ursdispreqdate = $rowdispreq['URS_REQUEST_DATE'];
                                        $ursdisppurpose = $rowdispreq['URS_PURPOSE'];
                                        $ursdispstatus = $rowdispreq['URS_STATUS_TO_PO'];

                                ?>

                                    <tr>

                                        <?php 
                                            if ($ursdispstatus == "Pending") 
                                            {
                                            
                                        ?>

                                        <td style="display: none;"> <?php echo $ursdispid; ?> </td>
                                        <td> <?php echo $ursdispno; ?> </td>
                                        <td> <?php echo $ursdispreqdate; ?> </td>
                                        <td> <?php echo $ursdisppurpose; ?> </td>
                                        <td> <p class="label label-warning label-mini" style="font-size: 13px;"> <?php echo $ursdispstatus; ?> </p> </td>
                                        <td class="hidden">
                                            <a data-toggle="modal" class="btn btn-success releasemodal" href="#ViewModal" href="javascript:;"><i class="fa fa-eye"></i></a>

                                            <a class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                                        </td>     

                                        <?php  
                                            } 
                                            elseif ($ursdispstatus == "Approved")
                                            {
                                        ?>

                                        <td style="display: none;"> <?php echo $ursdispid; ?> </td>
                                        <td> <?php echo $ursdispno; ?> </td>
                                        <td> <?php echo $ursdispreqdate; ?> </td>
                                        <td> <?php echo $ursdisppurpose; ?> </td>
                                        <td> <p class="label label-success label-mini" style="font-size: 13px;"> <?php echo $ursdispstatus; ?> </p> </td>
                                        <td class="hidden">
                                            <a data-toggle="modal" class="btn btn-success releasemodal" href="#ViewModal" href="javascript:;"><i class="fa fa-eye"></i></a>

                                            <a class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                                        </td>

                                        <?php  
                                            }
                                        ?>                                        

                                    </tr>

                                <?php
                                    }
                                ?>

                                </tbody>
                            </table>
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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ViewModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" style="color: white" class="close" type="button">×</button>
                    <h4 class="modal-title">Request Information</h4>
                </div>
                <div class="modal-body">

                    <form role="form" method="POST" id="form-data3">
                        <div class="form-group">
                            <div class="adv-table">
                                <table class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Request</th>
                                            <th style="width: 50px;">Unit</th>
                                            <th style="width: 50px;">Quantity</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td id="alname"></td>
                                            <td id="urunit"></td>
                                            <td id="urqty"></td>  
                                        </tr>
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

                    <button class="btn btn-success" id="btnsend" type="button">Submit</button>
                    <button data-dismiss="modal" class="btn btn-default" id="" type="button">Close</button>

                </div>
            </div>
        </div>
    </div>

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

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=reqperson]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=asttypesss]').val($(this).val());            
            });
        });

        $('.classtbl a.releasemodal').click(function (e) {

            var id = $(this).closest('tr').children('td:first').text();

            var oid = document.getElementById("officeid2").value;

            $.ajax({
                type: "GET",
                url: 'DUDashboard/AjaxGetData.php',
                dataType: 'json',
                data: {
                    _id: id,
                    _oid: oid
                },
                success: function (data) {
                    document.getElementById('alname').innerText = data.alname;
                    document.getElementById('urunit').innerText = data.urunit;
                    document.getElementById('urqty').innerText = data.urqty;
                },
                error: function (response) {
                    swal("Please naman!", "Gumana kana!", "error");
                }

            });

        });

    </script>



</body>
</html>
