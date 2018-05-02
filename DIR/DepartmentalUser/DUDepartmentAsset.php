<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Departmental User' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
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
    <title>Department Asset</title>
    <link rel="icon" href="../../images/PUPLogo.png" sizes="32x32">

</head>

<body>

    <section id="container">
        <?php include 'DUProfileModal.php'; ?> 

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

                    <li id="" class="">
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

                            <span class="username" id="getthenameofuser"> <?php echo $_SESSION['mysesi']; ?></span>
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
                                <!-- <li><a href="DUPpmpRequest.php">PPMP Request</a></li>                   -->
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
                                <li><a href="DUListOfRequest.php">List Of Request</a></li>
                                <li><a href="DUAssignedAsset.php">Assigned Asset</a></li>
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
                            <li><a href="DUDashboard.php"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="DUDepartmentAsset.php">Department Assets</a></li>
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
                                                    <th style="display: none;">ID</th>
                                                    <th style="display: none;">PARS ID</th>
                                                    <th style="width: 60px"></th>
                                                    <th style="width: 350px;">Asset</th> 
                                                    <th style="width: 90px;">Date Acquired</th>
                                                    <th style="width: 180px;">Assigned To</th>
                                                    <th style="width: 5px;"> </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php  

                                                    $getuserid = $_SESSION['myoid'];
                                                    $sql = "SELECT A.A_ID, A.A_DESCRIPTION, A.A_DATE, A.A_ACQUISITION_TYPE, EP.EP_FNAME, EP.EP_MNAME, EP.EP_LNAME, PAR.PAR_NO, PARS.PARS_ID FROM `ams_r_asset` AS A INNER JOIN `ams_t_par_sub` AS PARS ON PARS.A_ID = A.A_ID INNER JOIN `ams_t_par` AS PAR ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN `ams_r_employee_profile` AS EP ON PARS.EP_ID = EP.EP_ID LEFT JOIN `ams_t_report_of_damage_sub` AS RODS ON RODS.A_ID = A.A_ID WHERE A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NULL AND RODS.RODS_SHOW IS NULL AND EP.O_ID = $getuserid OR A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NOT NULL AND RODS.RODS_SHOW = 0 AND EP.O_ID = $getuserid";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    $i = 0;

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $i++;
                                                        $id = $row['A_ID'];
                                                        $description = $row['A_DESCRIPTION'];                             
                                                        $dateacquired = $row['A_DATE'];
                                                        $acqtype = $row['A_ACQUISITION_TYPE'];
                                                        $epfname = $row['EP_FNAME'];
                                                        $epmname = $row['EP_MNAME'];
                                                        $eplname = $row['EP_LNAME'];
                                                        $parno = $row['PAR_NO'];
                                                        $parsid = $row['PARS_ID'];
                                                        $assignedperson = $epfname.' '.$epmname.' '.$eplname;
                                                ?>

                                                <tr class="gradeX">

                                                    <td class="hidden">
                                                        <a id="getid<?php echo $i; ?>">
                                                            <?php echo $id; ?>
                                                        </a>
                                                    </td>

                                                    <td class="hidden">
                                                        <a id="getidqwe<?php echo $i; ?>">
                                                            <?php echo $parsid; ?>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <center>
                                                            <input type="checkbox" id="<?php echo $i; ?>" class="checkbox form-control ckthis" style="width: 20px">
                                                        </center>
                                                    </td>

                                                    <td id="origdescript<?php echo $i; ?>"> <?php echo $description; ?> </td>

                                                    <td id="origdateacq<?php echo $i; ?>"> <?php echo $dateacquired; ?> </td>

                                                    <td id="origassto<?php echo $i; ?>"> <?php echo $assignedperson; ?> </td>

                                                    <td> 
                                                        <a data-toggle="modal" class="btn btn-success" href="#myModal<?php echo $id; ?>"><i class="fa fa-eye"></i></a>
                                                    </td>
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
                                                                        <label style="color: black;">PAR NO :</label>
                                                                        <label style="font-size: 15px;"> <?php echo $parno; ?> </label> 
                                                                            <br>
                                                                        <label style="color: black;">Asset :</label>
                                                                        <label style="font-size: 15px;"> <?php echo $description; ?> </label> 
                                                                            <br>
                                                                        <label style="color: black;">Date Acquired :</label>
                                                                        <label style="font-size: 15px;"> <?php echo $dateacquired; ?> </label>
                                                                            <br>
                                                                        <label style="color: black;">Accountable Person :</label>
                                                                        <label style="font-size: 15px;"> <?php echo $assignedperson; ?> </label>
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

                                                <?php
                                                    $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_r_asset` AS A INNER JOIN `ams_t_par_sub` AS PARS ON PARS.A_ID = A.A_ID INNER JOIN `ams_t_par` AS PAR ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN `ams_r_employee_profile` AS EP ON PARS.EP_ID = EP.EP_ID LEFT JOIN `ams_t_report_of_damage_sub` AS RODS ON RODS.A_ID = A.A_ID WHERE A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NULL AND RODS.RODS_SHOW IS NULL AND EP.O_ID = $getuserid OR A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NOT NULL AND RODS.RODS_SHOW = 0 AND EP.O_ID = $getuserid";

                                                    $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                    while($row1 = mysqli_fetch_assoc($result1))
                                                    {
                                                        $cnt = $row1['AAA'];
                                                        echo '<input type="text" class="hidden" id="getcount" value="'.$i.'" />';
                                                    }
                                                ?>

                                                    <a class="btn btn-warning" id="assignbtn2">Release</a>

                                                    <a class="btn btn-warning hidden" id="assignbtn" data-toggle="modal" href="#ModalAssign">Release</a>

                                                    <a style="margin-left: 5px;" class="btn btn-danger" id="reportbtn2">Report</a>

                                                    <a style="margin-left: 5px;" class="btn btn-danger hidden" id="reportbtn" data-toggle="modal" href="#ModalReport">Report</a>

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
                                                        <th style="display: none;">ID</th>
                                                        <th style="display: none;">PARS ID</th>
                                                        <th style="width: 60px"></th>
                                                        <th style="width: 350px;">Description</th> 
                                                        <th style="width: 130px;">Date Acquired</th>
                                                        <th style="width: 180px;">Assigned To</th>
                                                        <th style="width: 20px;"> </th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php  

                                                        $getuserid = $_SESSION['myoid'];
                                                        $sql = "SELECT A.A_ID, A.A_DESCRIPTION, A.A_DATE, A.A_ACQUISITION_TYPE, EP.EP_FNAME, EP.EP_MNAME, EP.EP_LNAME, PAR.PAR_NO, PARS.PARS_ID FROM `ams_r_asset` AS A INNER JOIN `ams_t_par_sub` AS PARS ON PARS.A_ID = A.A_ID INNER JOIN `ams_t_par` AS PAR ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN `ams_r_employee_profile` AS EP ON PARS.EP_ID = EP.EP_ID LEFT JOIN `ams_t_report_of_damage_sub` AS RODS ON RODS.A_ID = A.A_ID WHERE A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NULL AND RODS.RODS_SHOW IS NULL AND EP.O_ID = $getuserid OR A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NOT NULL AND RODS.RODS_SHOW = 0 AND EP.O_ID = $getuserid";

                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                        $i = 0;

                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            $i++;
                                                            $id = $row['A_ID'];
                                                            $description = $row['A_DESCRIPTION'];                             
                                                            $dateacquired = $row['A_DATE'];
                                                            $acqtype = $row['A_ACQUISITION_TYPE'];
                                                            $epfname = $row['EP_FNAME'];
                                                            $epmname = $row['EP_MNAME'];
                                                            $eplname = $row['EP_LNAME'];
                                                            $parno = $row['PAR_NO'];
                                                            $parsid = $row['PARS_ID'];
                                                            $assignedperson = $epfname.' '.$epmname.' '.$eplname;
                                                    ?>

                                                    <tr class="gradeX">

                                                        <td class="hidden">
                                                            <a id="getids<?php echo $i; ?>">
                                                                <?php echo $id; ?>
                                                            </a>
                                                        </td>

                                                        <td class="hidden">
                                                            <a id="getidqwes<?php echo $i; ?>">
                                                                <?php echo $parsid; ?>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <center>
                                                                <input type="checkbox" id="chkvalsz<?php echo $i; ?>" class="checkbox form-control" style="width: 20px">
                                                            </center>
                                                        </td>

                                                        <td id="origdescripts<?php echo $i; ?>"> <?php echo $description; ?> </td>

                                                        <td id="origdateacqs<?php echo $i; ?>"> <?php echo $dateacquired; ?> </td>

                                                        <td id="origasstos<?php echo $i; ?>"> <?php echo $assignedperson; ?> </td>

                                                        <td> 
                                                            <a data-toggle="modal" class="btn btn-success" href="#myModal<?php echo $id; ?>"><i class="fa fa-eye"></i></a>
                                                        </td>
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
                                                                            <label style="color: black;">PAR NO :</label>
                                                                            <label style="font-size: 15px;"> <?php echo $parno; ?> </label> 
                                                                                <br>
                                                                            <label style="color: black;">Asset :</label>
                                                                            <label style="font-size: 15px;"> <?php echo $description; ?> </label> 
                                                                                <br>
                                                                            <label style="color: black;">Date Acquired :</label>
                                                                            <label style="font-size: 15px;"> <?php echo $dateacquired; ?> </label>
                                                                                <br>
                                                                            <label style="color: black;">Accountable Person :</label>
                                                                            <label style="font-size: 15px;"> <?php echo $assignedperson; ?> </label>
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

                                                    <?php
                                                        $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_r_asset` AS A INNER JOIN `ams_t_par_sub` AS PARS ON PARS.A_ID = A.A_ID INNER JOIN `ams_t_par` AS PAR ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN `ams_r_employee_profile` AS EP ON PARS.EP_ID = EP.EP_ID LEFT JOIN `ams_t_report_of_damage_sub` AS RODS ON RODS.A_ID = A.A_ID WHERE A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NULL AND RODS.RODS_SHOW IS NULL AND EP.O_ID = $getuserid OR A.A_STATUS = 'Serviceable' AND A.A_DISPOSAL_STATUS = 0 AND A.A_AVAILABILITY = 'Assigned' AND PARS.PARS_CANCEL = 0 AND RODS.RODS_CANCEL_DATE IS NOT NULL AND RODS.RODS_SHOW = 0 AND EP.O_ID = $getuserid";

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
    <script src="OrganizationCompliance.js"></script>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalAssign" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Releasing Of Asset</h4>
                </div>

                <div class="modal-body">

                    <form role="form" method="POST" id="form-data3">
                        <div class="form-group">
                            <div class="adv-table">
                                <table class="display table table-bordered table-striped" id="dynamic-table tblmodal">
                                    <thead>
                                        <tr>
                                            <th class="hidden">ID</th>
                                            <th style="word-wrap: break-word;">Description</th>
                                            <th style="width: 180px;">Accountable Person</th>
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
                            <label>Reason Of Releasing:</label>
                            <textarea style="color: black; word-wrap: break-word; resize: none; height: 120px;" class="form-control" maxlength="200" id="modrelreason" required=""></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px;">
                            </div>
                        </div>
                    </div>

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

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalReport" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Report For Damaged Asset</h4>
                </div>

                <div class="modal-body">

                    <form role="form" method="POST" id="form-data3">
                        <div class="form-group">
                            <div class="adv-table">
                                <table class="display table table-bordered table-striped" id="dynamic-table tblmodal">
                                    <thead>
                                        <tr>
                                            <th class="hidden">ID</th>
                                            <th style="word-wrap: break-word;">Description</th>
                                            <th style="width: 180px;">Accountable Person</th>
                                        </tr>
                                    </thead>
                                    <tbody id="newmodalgets">

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
                            <label>Report:</label>
                            <textarea style="color: black; word-wrap: break-word; resize: none; height: 120px;" class="form-control" maxlength="200" id="moreocirc" required=""></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" id="btnsend2" type="button">Submit</button>
                    <button data-dismiss="modal" class="btn btn-default" id="" type="button">Close</button>

                </div>

            </div>
        </div>
    </div>

    <!-- END JAVASCRIPTS -->
    <script type="text/javascript" src="../../js/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#assignbtn2').click(function() {

                var getthecnt = document.getElementById('getcount').value;
                var ck = '';
                var filltable = '';
                var noofchecked = 0;

                for (var z = getthecnt; z > 0; z--) {

                    var ck = 'chkvalsz' + z;
                    if (document.getElementById(ck).checked) {
                        var idz = document.getElementById('getids' + z).innerText;
                        var paridz = document.getElementById('getidqwes' + z).innerText;
                        var statz = document.getElementById('origdescripts' + z).innerText;
                        var descz = document.getElementById('origasstos' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td class="hidden">' + paridz + '</td><td>' + statz + '</td><td>' + descz + '</tr>';
                        noofchecked = noofchecked + 1;
                    }
                    document.getElementById('newmodalget').innerHTML = filltable;
                }
                // alert(noofchecked);

                if (noofchecked == 0) 
                {
                    // alert('tago');
                    swal("Please select atleast one item/asset.", "To release item/asset from your department please select atleast one.", "warning");
                }
                else
                {
                    // alert('labas modal');
                    $('#assignbtn').click();
                }

            });
        });
    </script>

    <!-- REPORT -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('#reportbtn2').click(function() {

                var getthecnt = document.getElementById('getcount').value;
                var ck = '';
                var filltable = '';
                var noofchecked = 0;

                for (var z = getthecnt; z > 0; z--) {

                    var ck = 'chkvalsz' + z;
                    if (document.getElementById(ck).checked) {
                        var idz = document.getElementById('getids' + z).innerText;
                        var statz = document.getElementById('origdescripts' + z).innerText;
                        var descz = document.getElementById('origasstos' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td>' + statz + '</td><td>' + descz + '</tr>';
                        noofchecked = noofchecked + 1;
                    }
                    document.getElementById('newmodalgets').innerHTML = filltable;
                }


                // alert(noofchecked);

                if (noofchecked == 0) 
                {
                    // alert('tago');
                    swal("Please select atleast one item/asset.", "To report item/asset please select atleast one.", "warning");
                }
                else
                {
                    // alert('labas modal');
                    $('#reportbtn').click();
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
                        var paridz = document.getElementById('getidqwes' + z).innerText;
                        var statz = document.getElementById('origdescripts' + z).innerText;
                        var descz = document.getElementById('origasstos' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td class="hidden">' + paridz + '</td><td>' + statz + '</td><td>' + descz + '</tr>';
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
                
                e.preventDefault();

                swal({
                        title: "Are you sure you want to release this asset from this department?",
                        text: "This action cannot be undone!",
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

                            var nameofcurruser = document.getElementById('getthenameofuser').innerText;
                            var reasontext = document.getElementById('modrelreason').value;

                            $.ajax({
                                type: 'POST',
                                url: 'InsertROA.php',
                                async: false,
                                data: {
                                    _nameofcurruser: nameofcurruser,
                                    _reasontext: reasontext
                                },
                                success: function(data2) {
                                    // alert(data2);                                    
                                },
                                error: function(response2) {
                                    // alert(response2);                                    
                                }

                            });

                            $('#newmodalget tr').each(function(index, val) {

                                $.ajax({
                                    type: 'POST',
                                    url: 'InsertROASubPart.php',
                                    async: false,
                                    data: {
                                        _nameofcurruser: nameofcurruser,
                                        _aid: $(this).closest('tr').children('td:first').text(),
                                        _parid: $(this).closest('tr').children('td:first').next().text()
                                    },
                                    success: function(data2) {
                                        // alert(data2);

                                        swal("Asset Successfully Released!", "The asset is successfully released from this department.", "success");

                                        setTimeout(function() 
                                        {
                                            window.location=window.location;
                                        },2000);
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

            });

        });

        jQuery(document).ready(function() {
            initproftable.init();
            EditableTable.init();
        });

    </script>

    <script>
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

    <script type="text/javascript">
        $(document).ready(function() {
                
            $('#reportbtn').click(function() {

                var getthecnt = document.getElementById('getcount').value;
                var ck = '';
                var filltable = '';

                for (var z = getthecnt; z > 0; z--) {

                    var ck = 'chkvalsz' + z;
                    if (document.getElementById(ck).checked) {
                        var idz = document.getElementById('getids' + z).innerText;
                        var statz = document.getElementById('origdescripts' + z).innerText;
                        var descz = document.getElementById('origasstos' + z).innerText;
                        filltable = filltable + '<tr><td class="hidden">' + idz + '</td><td>' + statz + '</td><td>' + descz + '</tr>';
                    }
                    document.getElementById('newmodalgets').innerHTML = filltable;
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

            $('#btnsend2').click(function(e) {
                
                e.preventDefault();

                swal({
                        title: "Are you sure you want to send this report?",
                        text: "Once you report this asset, it will moved to the list of reported damaged asset.",
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

                            var reporteddamagereason = document.getElementById('moreocirc').value;

                            $.ajax({
                                type: 'POST',
                                url: 'InsertROD.php',
                                async: false,
                                data: {
                                    _reporteddamagereason: reporteddamagereason
                                },
                                success: function(data2) {
                                    // alert(data2);                                    
                                },
                                error: function(response2) {
                                    // alert(response2);                                    
                                }

                            });

                            $('#newmodalgets tr').each(function(index, val) {

                                $.ajax({
                                    type: 'POST',
                                    url: 'InsertRODSub.php',
                                    async: false,
                                    data: {
                                        _aid: $(this).closest('tr').children('td:first').text()
                                    },
                                    success: function(data2) {
                                        // alert(data2);

                                        swal("Report Successfully Sent!", "The report is sent to property officer.", "success");

                                        setTimeout(function() 
                                        {
                                            window.location=window.location;
                                        },2000);
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

            });

        });

    </script>

</body>

</html>
