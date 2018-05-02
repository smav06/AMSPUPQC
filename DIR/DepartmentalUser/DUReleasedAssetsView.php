<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Departmental User' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";

    }
    if (isset($_GET['receiveroasid']))
    {   
        $ids = $_GET['receiveroasid']; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--  <style type="text/css" media="print">
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
    </style>-->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="../../images/favicon.png">

    <title>Report For Transfer</title>

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
<?php include 'DUProfileModal.php'; ?> 

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
<input type="hidden" name="" id="officeidofuser" value="<?php echo $_SESSION["myoid"]; ?>">

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggles" href="#">
                <i class="fa fa-comment-o"></i>
                <span class="badge bg-warning count"></span>
            </a>
                
            <?php 

                $aydiopyuser = $_SESSION['myoid'];
                // echo $aydiopyuser;

                $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXXz FROM ams_t_user_request_summary AS URS INNER JOIN ams_t_user_request AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN ams_r_employee_profile AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE URS.URS_STATUS_TO_PO != 'Pending' AND O.O_ID = $aydiopyuser GROUP BY URS.URS_ID");

                while($rowx = mysqli_fetch_assoc($sqlcntx))
                {
                    $cntx = $rowx['XXXz'];
                    echo '<input type="hidden" id="cntofrequests" value="'.$cntx.'" />';
                }

                echo '<ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 330px;">
                </ul>';

            ?>
            
        </li>

        <!-- PARA SA ASSIGN -->                
        <?php include 'AssignNotifUI.php'; ?> 

        <!-- PARA SA REPORT -->                
        <?php include 'ReportNotifUI.php'; ?>

        <li id="header_notification_bar" class="">
            <a style="background-color: white;">
                <?php 
                    // echo $_SESSION['mytype']; 

                    $oid = $_SESSION['myoid'];                            

                    $reszxc = mysqli_query($connection, "SELECT * FROM ams_r_office WHERE O_ID = $oid");

                    while($row = mysqli_fetch_assoc($reszxc))
                    {
                        $oname = $row['O_NAME'];
                        echo $oname;
                    }

                ?>
            </a>
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
                <li><a href="#ModalProfile" id="profilebtn" data-toggle="modal"><i class=" fa fa-suitcase"></i>Profile</a></li>
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
                    <a href="javascript:;" class="active">
                        <i class="fa fa-list"></i>
                        <span>Queries</span>
                    </a>
                    <ul class="sub">
                        <li><a href="DUReportDamagedAsset.php">Reported Damaged Asset</a></li>
                        <li class="active"><a href="DUReportForTransfer.php">Released Asset</a></li>   
                        <li><a href="DUListOfRequest.php">List of Request</a></li>
                        <li><a href="DUAssignedAsset.php">Assigned Asset</a></li>
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
                    <li><a href="DUReportForTransfer.php">Released Asset</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12"> 
                <section class="panel">
                    <header class="panel-heading">
                        List of Released Asset
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                         </span>
                    </header>

                    <div class="panel-body">

                        <?php
                            $idofysir = $_SESSION['myoid']; 
                            
                            $sql = "SELECT * FROM ams_t_release_of_asset AS ROA INNER JOIN ams_t_release_of_asset_sub AS ROAS ON ROAS.ROA_ID = ROA.ROA_ID INNER JOIN ams_t_par_sub AS PARS ON PARS.A_ID = ROAS.A_ID INNER JOIN ams_r_asset AS A ON PARS.A_ID = A.A_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE ROA.ROA_ID = $ids AND PARS.PARS_CANCEL_BY IS NOT NULL AND O.O_ID = $idofysir GROUP BY A.A_ID";

                            $result= mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {                              
                                $rdate = $row['ROA_DATE'];
                                $reason = $row['ROA_REASON'];       
                            }                       
                        ?>

                        <div class="row group">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Released</label>
                                    <input type="Date" value="<?php echo $rdate; ?>" class="form-control" style="color: black;" disabled />
                                </div>
                            </div>   

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reason Of Release</label>
                                    <textarea style="color: black; word-wrap: break-word; resize: none; height: 85px;" class="form-control" maxlength="200" id="" required="" disabled><?php echo $reason; ?></textarea>
                                    <!-- <input type="text" value="" class="form-control" style="color: black;" disabled /> --> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 100%;">Released Items/Assets</th>
                                    </tr>
                                </thead>

                                <tbody> 

                                    <?php  

                                        $idofuserhere = $_SESSION['myoid'];
                                        // echo $idofuserhere;

                                        $sqldisp = "SELECT * FROM ams_t_release_of_asset AS ROA INNER JOIN ams_t_release_of_asset_sub AS ROAS ON ROAS.ROA_ID = ROA.ROA_ID INNER JOIN ams_t_par_sub AS PARS ON PARS.A_ID = ROAS.A_ID INNER JOIN ams_r_asset AS A ON PARS.A_ID = A.A_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE ROA.ROA_ID = $ids AND PARS.PARS_CANCEL_BY IS NOT NULL AND O.O_ID = $idofuserhere GROUP BY A.A_ID";

                                        $resultdisp = mysqli_query($connection, $sqldisp) or die("Bad Query: $sqldisp");

                                        while($rows = mysqli_fetch_assoc($resultdisp))
                                        {
                                            $reldesc = $rows['A_DESCRIPTION'];
                                            $relreason = $rows['ROA_REASON'];
                                            $acdate = $rows['A_DATE'];
                                            $reldate = $rows['PARS_CANCEL_DATE'];
                                    ?>

                                        <tr class="gradeX">
                                            <td> <?php echo $reldesc; ?> </td>
                                        </tr>

                                    <?php
                                        }
                                    ?>
                                </tbody>  
                            </table>
                        </div>

                        <div class="row group">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <a class="btn btn-default" href="DUReportForTransfer.php">Back</a>
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

    <script type="text/javascript">
        
        $(document).ready(function() {
            function load_unseen_notification(view = '') {

                var officeidofuser = document.getElementById('officeidofuser').value;

                $.ajax({
                    url:"fetchreqDU.php",
                    method:"POST",
                    data:{view:view, officeidofuser: officeidofuser},
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
             
            $(document).on('click', '.dropdown-toggles', function() {
                $('.count').html('');
                load_unseen_notification('yes');
            });
             
            setInterval(function(){ 
                load_unseen_notification();; 
            }, 1000);
        });

    </script>

    <!-- REPORT NOTIF -->
    <?php include 'ReportNotif.php'; ?> 

    <!-- ASSIGN NOTIF -->
    <?php include 'AssignNotif.php'; ?> 

    <!-- REPORT CLICKED STATUS -->
    <?php include 'ReportNotifClickedBtnScript.php'; ?> 

    <!-- ASSIGN CLICKED STATUS -->
    <?php include 'AssignNotifClickedBtnScript.php'; ?> 

</body>
</html>
