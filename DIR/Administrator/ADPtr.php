<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Administrator' && !isset($_SESSION['myuser'])  && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
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

    <title>Property Transfer Report</title>

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
    <a href="ADCampus.php" class="logo">
        <img src="../../images/pupqcnew.png" style="width: 193px; height: 37px;" alt="">
    </a>

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

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
                <li><a href="ADProfile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
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
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-wrench"></i>
                        <span>System Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADCampus.php">Campus</a></li>
                        <li><a href="ADDepartment.php">Department</a></li>
                        <li><a href="ADAssetType.php">Asset Library</a></li>
                        <li><a href="ADRequestingPerson.php">Disposal Location</a></li>  
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-gears"></i>
                        <span>Configuration</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADPpmp.php">PPMP</a></li>  
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="active">
                        <i class="fa fa-list"></i>
                        <span>Queries</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADQueryAsset.php">Asset</a></li>
                        <li><a href="ADRequest.php">Request</a></li>
                        <li><a href="ADPar.php">Purchase Accountability Receipt</a></li>
                        <li class="active"><a href="ADPtr.php">Property Transfer Report</a></li>
                        <li><a href="ADDispose.php">Disposed Asset</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>User Management</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADUsers.php">Users</a></li>
                        <li><a href="ADUserslog.php">User's Log</a></li>  
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
                        <li><a href="ADCampus.php"><i class="fa fa-list"></i>&nbsp;Queries</a></li>
                        <li><a href="ADCampus.php">Property Transfer Report</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            List of PTR's
                        </header>

                        <div class="panel-body">

                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped tblCampusData" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">Ptr ID</th>
                                            <th style="width: 250px">PTR No.</th>
                                            <th style="width: 250px">Date</th>
                                            <th style="width: 250px">Transferred By</th> 
                                            <th style="width: 250px">Received By</th>
                                            <th style="width: 250px">Campus</th>
                                        </tr>
                                    </thead>

                                    <tbody>  

                                    <?php  

                                        $sql = "SELECT ams_t_transfer_out_ptr.PTR_ID, ams_t_transfer_out_ptr.PTR_NO, ams_t_transfer_out_ptr.PTR_DATE, ams_t_transfer_out_ptr.PTR_RECEIVED_BY, ams_t_transfer_out_ptr.PTR_TRANSFERRED_BY, ams_r_campus.C_CODE FROM ams_t_transfer_out_ptr JOIN ams_r_campus ON ams_t_transfer_out_ptr.C_ID = ams_r_campus.C_ID";

                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                        while($row = mysqli_fetch_assoc($result))
                                            {
                                              $id = $row['PTR_ID'];
                                              $no = $row['PTR_NO'];
                                              $date = $row['PTR_DATE'];
                                              $rec = $row['PTR_RECEIVED_BY'];
                                              $tra = $row['PTR_TRANSFERRED_BY'];
                                              $camp = $row['C_CODE'];
                                    ?>                                      

                                        <tr class="gradeX"">
                                            <td style="display: none;"> <?php echo $id; ?> </td>
                                            <td> <?php echo $no; ?> </td>
                                            <td> <?php echo $date; ?> </td>
                                            <td> <?php echo $tra; ?> </td>
                                            <td> <?php echo $rec; ?> </td>
                                            <td> <?php echo $camp; ?> </td>
                                        </tr>

                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalUpdate<?php echo $id ?>" class="modal fade">
                                        <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2<?php echo $id; ?>" class="modal fade"> -->
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #8C1C1C; color: white">
                                                        <button aria-hidden="true" data-dismiss="modal" onclick="onClose()" class="close" type="button" style="color: white"><i class="fa-close-modal fa-times-circle"></i></button>
                                                        <h4 class="modal-title"><i class="fa-modal-ico fa-pencil-square"></i></h4>
                                                    </div>
            
                                                    <div class="modal-body">

                                                        <form role="form" method="POST">
                                                            <div class="form-group">
                                                                <label>Campus Code</label>
                                                                <input type="hidden" id="id<?php echo $id ?>" name="id" value="<?php echo $id ?>">

                                                                <input style="color: black;" type="text" onfocus="updatecampuscodeOnClick()" onblur="updatecampuscodeOnLeave()" class="form-control" id="updatecampuscode<?php echo $id ?>" value="<?php echo $code; ?>"/>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Campus Name</label>
                                                                <input style="color: black;" type="text" onfocus="updatecampusnameOnClick()" onblur="updatecampusnameOnLeave()" class="form-control" id="updatecampusname<?php echo $id ?>" value="<?php echo $name ?>"/>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;"></div>
                                                                </div>
                                                            </div>
            
                                                            <button class="btn btn-success" name="updatecampus" onclick="updateFormValidation(); doTransaction()" id="btn-save-update" style="margin-left: 380px; margin-bottom: -10px" type="button">Save Changes</button>
                                                            <button data-dismiss="modal" class="btn btn-default" onclick="onClose()" name="refreshpageeditcampus" style="float: right;" type="button">Close</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalAdd" class="modal fade">
<!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2<?php echo $id; ?>" class="modal fade"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #8C1C1C; color: white">
                <button aria-hidden="true" onclick="onClose()" data-dismiss="modal" class="close" type="button" style="color: white"><i class="fa-close-modal fa-times-circle"></i></button>
                <h4 class="modal-title"><i class="fa-modal-ico fa-plus-square   "></i></h4>
            </div>
            
            <div class="modal-body">

                <form role="form" method="POST">
                    <div class="form-group">
                        <label><strong>Campus Code</strong></label>
                        <input style="color: black;" onfocus="addcampuscodeOnClick()" onblur="addcampuscodeOnLeave()" type="text" class="form-control" id="addcampuscode"/>
                    </div>

                    <div class="form-group">
                        <label><strong>Campus Name</strong></label>
                        <input style="color: black;" onfocus="addcampusnameOnClick()" onblur="addcampusnameOnLeave()" type="text" class="form-control" id="addcampusname"/>
                    </div>

                <div class="row">
                    <div class="col-md-12">
                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;"></div>
                    </div>
                </div>
    
                <button class="btn btn-success" name="addcampus" id="btn-submit" onclick="formValidation()" type="button" style="margin-left: 425px; margin-bottom: -10px">Submit</button>
                <button data-dismiss="modal" class="btn btn-default" id="closeAddModal" onclick="onClose()" name="refreshpageaddcampus" type="button" style="float: right">Close</button>
                
                </form>
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


</body>
</html>
