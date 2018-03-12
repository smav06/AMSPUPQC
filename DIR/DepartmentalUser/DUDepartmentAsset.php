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

    <title>Department Asset</title>

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
    <link href="../../s/iCheck/skins/flat/green.css" rel="stylesheet">
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

                <span class="username"> <?php echo $_SESSION['mysesi']; ?></span>
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
                    <a class="active" href="DUDepartmentAsset.php">
                        <i class="fa fa-laptop"></i>
                        <span>Department Assets</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-comment-o"></i>
                        <span>Requisition</span>
                    </a>
                    <ul class="sub">
                        <li><a href="DURequest.php">Request</a></li>
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
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Department Assets
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                     </span>
                </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped classtbl" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th style="">ID</th>
                                        <th style="">Description</th> 
                                        <th style="">Date Acquired</th>
                                    </tr>
                                </thead>

                                <tbody> 

                                    <?php  

                                        $getuserid = $_SESSION['myoid'];

                                        $sql = "SELECT * FROM `ams_r_asset` AS A INNER JOIN `ams_t_par_sub` AS PARS ON PARS.A_ID = A.A_ID INNER JOIN `ams_t_par` AS PAR ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN `ams_r_employee_profile` AS EP ON PARS.EP_ID = EP.EP_ID LEFT JOIN `ams_t_report_of_damage_sub` AS RODS ON RODS.A_ID = A.A_ID WHERE A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NULL AND RODS.RODS_SHOW IS NULL AND EP.O_ID = $getuserid OR A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NOT NULL AND RODS.RODS_SHOW = 0 AND EP.O_ID = $getuserid";

                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                    ?>

                                    <tr class="gradeX">
                                        <td> <?php echo $code; ?> </td>
                                        <td> <?php echo $description; ?> </td>
                                        <td> <?php echo $dateacquired; ?> </td>
                                        <!-- <td>
                                                <a data-toggle="modal" class="btn btn-success" href="#myModal<?php echo $id; ?>">View</a>

                                                <a data-toggle="modal" class="btn btn-warning releasemodal" href="#ReleaseModal" href="javascript:;">Release</a>

                                                <a data-toggle="modal" class="btn btn-danger damagedmodal" href="#DamagedModal" href="javascript:;">Report</a>
                                        </td> -->
                                    </tr>

                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?php echo $id; ?>" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                    <h4 class="modal-title">Asset Details</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <form role="form" method="POST">
                                                        <div class="form-group">
                                                            <label>QR Code</label>
                                                            <input style="color: black;" type="text" name="" value="<?php echo $code; ?>" class="form-control" disabled />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Asset Description</label>
                                                            <input style="color: black; word-wrap: break-word;" type="text" name="" value="<?php echo $description; ?>" class="form-control" disabled />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Acquisition Type</label>
                                                            <input style="color: black;" type="text" name="" value="<?php echo $acqtype; ?>" class="form-control" disabled="">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Date Acquired</label>
                                                            <input style="color: black;" type="date" name="" value="<?php echo $dateacquired; ?>" class="form-control" disabled="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Accountable Person</label>
                                                            <input style="color: black;" type="text" name="" value="<?php echo $assignedperson; ?>" class="form-control" disabled="">
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
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

    <a class='btn btn-warning tar releasemodal hidden' style='color:white' data-toggle='modal' id="releasemodalupd" href='#ReleaseModal' href='javascript:;'>hidden release btn</a>

    <a class='btn btn-warning tar damagedmodal hidden' style='color:white' data-toggle='modal' id="damagedmodalupd" href='#DamagedModal' href='javascript:;'>hidden damage btn</a>
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
                        <div class="side-graph-info">
                        </div>
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

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ReleaseModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" style="color: white" class="close" type="button">×</button>
                    <h4 class="modal-title">Releasing Of Asset</h4>
                </div>
                <div class="modal-body">

                    <form role="form" id="form-data2" method="POST">
                        <div class="form-group">
                            <label>QR Code</label>
                            <input style="color: black;" type="text" class="form-control" id="modrelqrcode" disabled />
                        </div>
                        <div class="form-group">
                            <label>Asset Description</label>
                            <input style="color: black; word-wrap: break-word;" type="text" class="form-control" id="modrelastdesc" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Reason Of Releasing</label>
                            <textarea style="color: black; word-wrap: break-word; resize: none; height: 120px;" class="form-control" maxlength="200" id="modrelreason" required=""></textarea>
                        </div>                    

                        <input type="text" class="form-control hidden" id="qrcodehere">
                        <input type="text" class="form-control hidden" id="modrelempid">
                        <input type="text" class="form-control hidden" id="modrelastid">
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" id="modrelsubmit" type="button">Submit</button>
                    <button data-dismiss="modal" class="btn btn-default" id="modrelclose" type="button">Close</button>
                    
                </div>
            </div>
        </div>
    </div>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="DamagedModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Report For Damaged Asset</h4>
                </div>

                <div class="modal-body">
                    <form role="form" method="POST" id="form-data3">
                        <div class="form-group">
                            <label>QR Code</label>
                            <input style="color: black;" type="text" class="form-control" id="moddamqrcode" disabled />
                        </div>
                        <div class="form-group">
                            <label>Asset Description</label>
                            <input style="color: black; word-wrap: break-word;" type="text" class="form-control" id="moddamastdesc" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Report</label>
                            <textarea style="color: black; word-wrap: break-word; resize: none; height: 120px;" class="form-control" maxlength="200" id="moddamreport" required=""></textarea>
                        </div>

                        <input type="text" class="form-control hidden" id="qrcodeheredam">
                        <input type="text" class="form-control hidden" id="moddamempid">
                        <input type="text" class="form-control hidden" id="moddamastid">

                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" id="moddamsubmit" type="button">Submit</button>
                    <button data-dismiss="modal" class="btn btn-default" id="moddamclose" type="button">Close</button>                   

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

    <script type="text/javascript" src="DUDashboard.js"></script>

    <script>
        $(document).ready(function() {
            $('#drpcat').change(function() {
                var e = document.getElementById("drpcat");
                var getcat = e.options[e.selectedIndex].text;
                if (getcat == 'Academic Organization')
                    $('#course').removeClass('hidden');
                else
                    $('#course').addClass('hidden');


            });
            $('#drpupdcat').change(function() {
                var e = document.getElementById("drpupdcat");
                var getcat = e.options[e.selectedIndex].text;
                if (getcat == 'Academic Organization')
                    $('#updcourse').removeClass('hidden');
                else
                    $('#updcourse').addClass('hidden');


            });
            $('.releasemodal').click(function() {


            });
            $('.damagedmodal').click(function() {

            });
            // // $('#submit-data').click(function() { // // // });

        });

    </script>

</body>
</html>
