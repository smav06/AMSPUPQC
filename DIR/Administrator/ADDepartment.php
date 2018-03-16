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

    <title>Department</title>

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
                    <a href="javascript:;" class="active">
                        <i class="fa fa-wrench"></i>
                        <span>System Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADCampus.php">Campus</a></li>
                        <li class="active"><a href="ADDepartment.php">Department</a></li>
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
                    <a href="javascript:;">
                        <i class="fa fa-list"></i>
                        <span>Queries</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADQueryAsset.php">Asset</a></li>
                        <li><a href="ADRequest.php">Request</a></li>
                        <li><a href="ADPar.php">Purchase Accountability Receipt</a></li>
                        <li><a href="ADPr.php">Purchase Request</a></li>
                        <li><a href="ADPo.php">Purchase Order</a></li>
                        <li><a href="ADPtr.php">Property Transfer Report</a></li>
                        <li><a href="ADJobOrder.php">Job Order</a></li> 
                        <li><a href="ADDispose.php">Disposed Asset</a></li>
                        <li><a href="ADTransferredOut.php">Transferred Out Asset</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>User Management</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADUsers.php">Users</a></li>
                        <li><a href="ADUsers.php">User's Log</a></li>  
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
                        <li><a href="ADCampus.php"><i class="fa fa-wrench"></i> System Setup</a></li>
                        <li><a href="ADCampus.php">Department</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            List of Departments
                        </header>

                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <a data-toggle="modal" class="btn btn-success" href="#myModalAdd"><i class="fa fa-plus"></i> Add Department</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; margin-top: 10px; background-color: #E0E1E7;">                                                             
                                    </div>
                                </div>
                            </div>

                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped tblCampusData" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">Department ID</th>
                                            <th style="width: 200px">Department Code</th>
                                            <th style="width: 550px">Department Name</th>
                                            <th style="width: 200px">Campus</th>
                                            <th style="width: 70px">Action</th>  
                                        </tr>
                                    </thead>

                                    <tbody>  

                                    <?php  

                                        $sql = "SELECT ams_r_office.O_ID, ams_r_office.O_CODE, ams_r_office.O_NAME, ams_r_campus.C_CODE FROM ams_r_office JOIN ams_r_campus ON ams_r_office.C_ID = ams_r_campus.C_ID";

                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                        while($row = mysqli_fetch_assoc($result))
                                            {
                                                $id = $row['O_ID'];
                                                $code = $row['O_CODE'];
                                                $name = $row['O_NAME'];
                                                $ccode = $row['C_CODE']
                                    ?>                                      

                                        <tr class="gradeX"">
                                            <td style="display: none;"> <?php echo $id; ?> </td>
                                            <td> <?php echo $code; ?> </td>
                                            <td> <?php echo $name; ?> </td>
                                            <td> <?php echo $ccode; ?> </td>
                                            <td>
                                                <a data-toggle="modal" class="btn btn-success updateCampus" href="#myModalUpdate<?php echo $id ?>"><i class="fa fa-pencil"></i>  Edit</a>
                                            </td>
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

    <script type="text/javascript">
        
        function onClose()
        {
            window.location = window.location;
        }

        function formValidation()
        {
            if (document.getElementById('addcampuscode').value == "" || document.getElementById('addcampuscode').value == "Empty Fields are not allowed.") 
            {
                document.getElementById('addcampuscode').value = "Empty Fields are not allowed."
                document.getElementById('addcampuscode').style.color = "red";
                document.getElementById('addcampuscode').style.backgroundColor = "#ffffcc";
                document.getElementById('addcampuscode').style.borderColor = "red";
            }

            if (document.getElementById('addcampusname').value == "" || document.getElementById('addcampusname').value == "Empty Fields are not allowed.") 
            {
                document.getElementById('addcampusname').value = "Empty Fields are not allowed."
                document.getElementById('addcampusname').style.color = "red";
                document.getElementById('addcampusname').style.backgroundColor = "#ffffcc";
                document.getElementById('addcampusname').style.borderColor = "red";
            }

            if (document.getElementById('addcampuscode').value != "" && document.getElementById('addcampuscode').value != "Empty Fields are not allowed." && document.getElementById('addcampusname').value != "" && document.getElementById('addcampusname').value != "Empty Fields are not allowed.") 
            {
                var campuscode = document.getElementById('addcampuscode').value;
                var campusname = document.getElementById('addcampusname').value;

                swal(
                {
                    title: "Warning!",
                    text: "This transaction can't be undone. Are you sure you want to do it?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, do it!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },

                    function(isConfirm)
                    {
                        if (isConfirm) 
                        {
                            $.ajax(
                            {
                                type: 'POST',
                                url : 'insertcampus.php',
                                data: 
                                {
                                    _campuscode: campuscode,
                                    _campusname: campusname

                                },
                                
                                success: function(data)
                                {

                                    swal(
                                    {
                                        title: 'Successful!',
                                        text: 'The campus is inserted successfully.',
                                        type: 'success',
                                        confirmButtonColor: '#43A047',
                                        confirmButtonText: 'OK',
                                        closeOnConfirm: false
                                    },

                                        function(isConfirm)
                                        {
                                            if (isConfirm) 
                                            {
                                                window.location=window.location; 
                                            }
                                        }
                                    
                                    );
              
                                    setTimeout(
                                    function() 
                                    {
                                        window.location = window.location;
                                    },
                                    5000
                                    );

                                },

                                error: function(response)
                                {
                                    alert(request.resposeText);
                                }
                            }           
                            );
                        }

                        else 
                        {
                            swal(
                            {
                                title: 'Cancelled!',
                                text: 'You have cancelled the transaction.',
                                type: 'error',
                                confirmButtonColor: '#43A047',
                                confirmButtonText: 'OK',
                                closeOnConfirm: true
                            });
                                        
                        }//endelse{}
                    }
                );//endswal()
            }//endif{}            
        }//endfunc()

        function updateFormValidation()
        {
            <?php

                $sqlcmd = "SELECT count(1) FROM ams_r_campus";

                $resulta = mysqli_query($connection, $sqlcmd) or die("Bad Query: $sql");
                $row1 = mysqli_fetch_array($resulta);

                $kabuuan = $row1[0];

            ?>

            var total = <?php echo $kabuuan ?>;

            for(i = 1; i <= total; i++)
            {

                if (document.getElementById('updatecampuscode' + i).value == "" || document.getElementById('updatecampuscode' + i).value == "Empty Fields are not allowed.") 
                {
                    document.getElementById('updatecampuscode' + i).value = "Empty Fields are not allowed."
                    document.getElementById('updatecampuscode' + i).style.color = "red";
                    document.getElementById('updatecampuscode' + i).style.backgroundColor = "#ffffcc";
                    document.getElementById('updatecampuscode' + i).style.borderColor = "red";
                }

                if (document.getElementById('updatecampusname' + i).value == "" || document.getElementById('updatecampusname' + i).value == "Empty Fields are not allowed.") 
                {
                    document.getElementById('updatecampusname' + i).value = "Empty Fields are not allowed."
                    document.getElementById('updatecampusname' + i).style.color = "red";
                    document.getElementById('updatecampusname' + i).style.backgroundColor = "#ffffcc";
                    document.getElementById('updatecampusname' + i).style.borderColor = "red";
                }            
            }//endfor
        }//endfunc()

        function doTransaction()
        {
            <?php

                $sqlcmd = "SELECT count(1) FROM ams_r_campus";

                $resulta = mysqli_query($connection, $sqlcmd) or die("Bad Query: $sql");
                $row1 = mysqli_fetch_array($resulta);

                $kabuuan = $row1[0];

            ?>

            var total = <?php echo $kabuuan ?>;

            for(i = 1; i <= total; i++)
            {

                if (document.getElementById('updatecampuscode' + i).value !== "Empty Fields are not allowed." && document.getElementById('updatecampusname' + i).value !== "Empty Fields are not allowed.") 
                {
                    var campuscode = document.getElementById('updatecampuscode' + i).value;
                    var campusname = document.getElementById('updatecampusname' + i).value;
                    var id = document.getElementById('id' + i).value;

                    swal(
                    {
                        title: "Warning!",
                        text: "This transaction can't be undone. Are you sure you want to do it?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, do it!',
                        cancelButtonText: "No, cancel it!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },

                        function(isConfirm)
                        {
                            if (isConfirm) 
                            {
                                $.ajax(
                                {
                                    type: 'POST',
                                    url : 'updatecampus.php',
                                    data: 
                                    {
                                        _campuscode: campuscode,
                                        _campusname: campusname,
                                        _id: id

                                    },
                                        
                                    success: function(data)
                                    {

                                        swal(
                                        {
                                            title: 'Successful!',
                                            text: 'The campus is updated successfully.',
                                            type: 'success',
                                            confirmButtonColor: '#43A047',
                                            confirmButtonText: 'OK',
                                            closeOnConfirm: false
                                        },

                                            function(isConfirm)
                                            {
                                                if (isConfirm) 
                                                {
                                                    window.location=window.location; 
                                                }
                                            }
                                            
                                        );
                      
                                        setTimeout(
                                        function() 
                                        {
                                            window.location = window.location;
                                        },
                                        5000
                                        );

                                    },

                                    error: function(response)
                                    {
                                        alert(request.resposeText);
                                    }
                                }           
                                );
                            }

                            else 
                            {
                                swal(
                                {
                                    title: 'Cancelled!',
                                    text: 'You have cancelled the transaction.',
                                    type: 'error',
                                    confirmButtonColor: '#43A047',
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: true
                                }
                                );
                                                
                            }//endelse{}
                        }//endfunc(isconfirm)
                    );//endswal()
                }//endif{}
            }//endfor{}
        }//endfunc()


        function addcampuscodeOnClick()
        {
            if (document.getElementById('addcampuscode').value == "Empty Fields are not allowed.")
            {
                document.getElementById('addcampuscode').value = "";
                document.getElementById('addcampuscode').style.color = "black";
                document.getElementById('addcampuscode').style.backgroundColor = "white";
                document.getElementById('addcampuscode').style.borderColor = "#00A8B3";
            }
        }

        function updatecampuscodeOnClick()
        {
            <?php

                $sqlcmd = "SELECT count(1) FROM ams_r_campus";

                $resulta = mysqli_query($connection, $sqlcmd) or die("Bad Query: $sql");
                $row1 = mysqli_fetch_array($resulta);

                $kabuuan = $row1[0];

            ?>

            var total = <?php echo $kabuuan ?>;

            for(i = 1; i <= total; i++)
            {
                if (document.getElementById('updatecampuscode' + i).value == "Empty Fields are not allowed.")
                {
                    document.getElementById('updatecampuscode' + i).value = "";
                    document.getElementById('updatecampuscode' + i).style.color = "black";
                    document.getElementById('updatecampuscode' + i).style.backgroundColor = "white";
                    document.getElementById('updatecampuscode' + i).style.borderColor = "#00A8B3";
                }
            }
        }

        function addcampusnameOnClick()
        {
            if (document.getElementById('addcampusname').value == "Empty Fields are not allowed.")
            {
                document.getElementById('addcampusname').value = "";
                document.getElementById('addcampusname').style.color = "black";
                document.getElementById('addcampusname').style.backgroundColor = "white";
                document.getElementById('addcampusname').style.borderColor = "#00A8B3";
            }
        }

        function updatecampusnameOnClick()
        {
            <?php

                $sqlcmd = "SELECT count(1) FROM ams_r_campus";

                $resulta = mysqli_query($connection, $sqlcmd) or die("Bad Query: $sql");
                $row1 = mysqli_fetch_array($resulta);

                $kabuuan = $row1[0];

            ?>

            var total = <?php echo $kabuuan ?>;

            for(i = 1; i <= total; i++)
            {
                if (document.getElementById('updatecampusname' + i).value == "Empty Fields are not allowed.")
                {
                    document.getElementById('updatecampusname' + i).value = "";
                    document.getElementById('updatecampusname' + i).style.color = "black";
                    document.getElementById('updatecampusname' + i).style.backgroundColor = "white";
                    document.getElementById('updatecampusname' + i).style.borderColor = "#00A8B3";
                }
            }
        }

        function addcampuscodeOnLeave()
        {
            document.getElementById('addcampuscode').style.borderColor = "#E2E2E4";
        }

        function addcampusnameOnLeave()
        {
            document.getElementById('addcampusname').style.borderColor = "#E2E2E4";
        }

        function updatecampuscodeOnLeave()
        {
            <?php

                $sqlcmd = "SELECT count(1) FROM ams_r_campus";

                $resulta = mysqli_query($connection, $sqlcmd) or die("Bad Query: $sql");
                $row1 = mysqli_fetch_array($resulta);

                $kabuuan = $row1[0];

            ?>

            var total = <?php echo $kabuuan ?>;

            for(i = 1; i <= total; i++)
            {
                document.getElementById('updatecampuscode' + i).style.borderColor = "#E2E2E4";
            }
        }

        function updatecampusnameOnLeave()
        {
            <?php

                $sqlcmd = "SELECT count(1) FROM ams_r_campus";

                $resulta = mysqli_query($connection, $sqlcmd) or die("Bad Query: $sql");
                $row1 = mysqli_fetch_array($resulta);

                $kabuuan = $row1[0];

            ?>

            var total = <?php echo $kabuuan ?>;

            for(i = 1; i <= total; i++)
            {
                document.getElementById('updatecampusname' + i).style.borderColor = "#E2E2E4";
            }
        }

/*        $('.tblCampusData a.updateCampus').click(function (e) 
        {
            e.preventDefault();

            $.ajax(
            {
                type: "GET",
                url: 'getcampusdata.php',
                dataType: 'json',

                success: function(data) 
                {
                    document.getElementById('updatecampuscode').value = data.campuscode;
                    document.getElementById('updatecampusname').value = data.campusname;
                    document.getElementById('id').value = data.uniqueid;
                },

                error: function(response) 
                {
                    alert(request.responseText);
                }

            }
            );
        }
        );*/

/*        $(document).on("click", "#btn-save-update", function(event)
        {
            <?php

                $sqlcmd = "SELECT count(1) FROM ams_r_campus";

                $resulta = mysqli_query($connection, $sqlcmd) or die("Bad Query: $sql");
                $row1 = mysqli_fetch_array($resulta);

                $kabuuan = $row1[0];

            ?>

            var total = <?php echo $kabuuan ?>;

            for(i = 1; i <= total; i++)
            {

                if (document.getElementById('updatecampuscode' + i).value == "" || document.getElementById('updatecampuscode' + i).value == "Empty Fields are not allowed.") 
                {
                    document.getElementById('updatecampuscode' + i).value = "Empty Fields are not allowed."
                    document.getElementById('updatecampuscode' + i).style.color = "red";
                    document.getElementById('updatecampuscode' + i).style.backgroundColor = "#ffffcc";
                    document.getElementById('updatecampuscode' + i).style.borderColor = "red";
                }

                if (document.getElementById('updatecampusname' + i).value == "" || document.getElementById('updatecampusname' + i).value == "Empty Fields are not allowed.") 
                {
                    document.getElementById('updatecampusname' + i).value = "Empty Fields are not allowed."
                    document.getElementById('updatecampusname' + i).style.color = "red";
                    document.getElementById('updatecampusname' + i).style.backgroundColor = "#ffffcc";
                    document.getElementById('updatecampusname' + i).style.borderColor = "red";
                }

                if (document.getElementById('updatecampuscode' + i).value != "" && document.getElementById('updatecampuscode' + i).value != "Empty Fields are not allowed." && document.getElementById('updatecampusname' + i).value != "" && document.getElementById('updatecampusname' + i).value != "Empty Fields are not allowed.") 
                {


                    var campuscode = document.getElementById('updatecampuscode' + i).value;
                    var campusname = document.getElementById('updatecampusname' + i).value;
                    var id = document.getElementById('id' + i).value;

                    swal(
                    {
                        title: "Warning!",
                        text: "This transaction can't be undone. Are you sure you want to do it?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, do it!',
                        cancelButtonText: "No, cancel it!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },

                        function(isConfirm)
                        {
                            if (isConfirm) 
                            {
                                $.ajax(
                                {
                                    type: 'POST',
                                    url : 'updatecampus.php',
                                    data: 
                                    {
                                        _campuscode: campuscode,
                                        _campusname: campusname,
                                        _id: id

                                    },
                                    
                                    success: function(data)
                                    {

                                        swal(
                                        {
                                            title: 'Successful!',
                                            text: 'The campus is updated successfully.',
                                            type: 'success',
                                            confirmButtonColor: '#43A047',
                                            confirmButtonText: 'OK',
                                            closeOnConfirm: false
                                        },

                                            function(isConfirm)
                                            {
                                                if (isConfirm) 
                                                {
                                                    window.location=window.location; 
                                                }
                                            }
                                        
                                        );
                  
                                        setTimeout(
                                        function() 
                                        {
                                            window.location = window.location;
                                        },
                                        5000
                                        );

                                    },

                                    error: function(response)
                                    {
                                        alert(request.resposeText);
                                    }
                                }           
                                );
                            }

                            else 
                            {
                                swal(
                                {
                                    title: 'Cancelled!',
                                    text: 'You have cancelled the transaction.',
                                    type: 'error',
                                    confirmButtonColor: '#43A047',
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: true
                                });
                                            
                            }//endelse{}
                        }//endfunc(isconfirm)
                    );//endswal()
                }//endif{}            
            }//endforloop()
        }//endclickfunc()
        );//endclickfunc()*/

    </script>   



    <script type="text/javascript">
    $(document).ready(function(){
        "use strict";
        
        $('.btn-message').click(function(){
            swal("Here's a message!");
        });
        
        $('.btn-title-text').click(function(){
            swal("Here's a message!", "It's pretty, isn't it?")
        });

        $('.btn-timer').click(function(){
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            });
        });
        
        $('.btn-successs').click(function(){
            swal("Good job!", "You clicked the button!", "success");
        });
        
        $('.btn-warning-confirm').click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false
            },
            function(){
                swal("Deleted!", "Your imaginary file has been deleted!", "success");
            });
        });
        
        $('.btn-warning-cancel').click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm){
              swal("Deleted!", "Your imaginary file has been deleted!", "success");
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
            });
        });
        
        $('.btn-custom-icon').click(function(){
            swal({
                title: "Sweet!",
                text: "Here's a custom image.",
                imageUrl: 'images/favicon/apple-touch-icon-152x152.png'
            });
        });
        
        $('.btn-message-html').click(function(){
            swal({
                title: "HTML <small>Title</small>!",
                text: 'A custom <span style="color:#F8BB86">html<span> message.',
                html: true
            });
        });
        
        $('.btn-input').click(function(){
            swal({
                title: "An input!",
                text: 'Write something interesting:',
                type: 'input',
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something",
            },
            function(inputValue){
                if (inputValue === false) return false;
        
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false;
                }
            
                swal("Nice!", 'You wrote: ' + inputValue, "success");
        
            });
        });
        
        $('.btn-theme').click(function(){
            swal({
                title: "Themes!",
                text: "Here's the Twitter theme for SweetAlert!",
                confirmButtonText: "Cool!",
                customClass: 'twitter'
            });
        });
        
        $('.btn-ajax').click(function(){
          swal({
            title: 'Ajax request example',
            text: 'Submit to run ajax request',
            type: 'info',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          }, function(){
            setTimeout(function() {
              swal('Ajax request finished!');
            }, 2000);
          });
        });

        /*$('#btn-save-update').click(function(){


                var updatecampuscode = document.getElementById('updatecampuscode').value;
                var updatecampusname = document.getElementById('updatecampusname').value;
                var id = document.getElementById('id').value;

                $.ajax
                ({

                    type: 'post',
                    url: 'sweet-alert-ad-update-campus.php',
                    data: 
                    {
                        _updatecampuscode:updatecampuscode,
                        _updatecampusname:updatecampusname,
                        _id:id
                    },

                    success: function (response) 
                    {


                        swal({
                             title: 'Successfully Updated!',
                             type: 'success',
                             confirmButtonColor: '#43A047',
                             confirmButtonText: 'OK',
                             closeOnConfirm: false
                        },

                        function(isConfirm)
                        {
                            if (isConfirm) 
                            {
                                window.location=window.location; 
                            }
                        });

                        setTimeout(function() 
                        {
                            window.location=window.location;
                        }, 5000);

                        // window.location.reload();
                    },

                    error: function (response) 
                    {
                      swal({
                            title: 'Update Failed!',
                            text: 'Please try again.',
                            confirmButtonText: 'Okay',
                            confirmButtonColor: 'red'
                      });

                        setTimeout(function() 
                        {
                            window.location=window.location;
                        }, 5000);
                    }

            });
        });

        $('#btn-submit').click(function(){


                var addcampuscode = document.getElementById('addcampuscode').value;
                var addcampusname = document.getElementById('addcampusname').value;

                $.ajax
                ({

                    type: 'post',
                    url: 'insert-ad-campus.php',
                    data: 
                    {
                        _addcampuscode:addcampuscode,
                        _addcampusname:addcampusname
                    },

                    success: function (response) 
                    {

                        $('#myModalAdd').hide(100);
                        $('.modal-backdrop').hide(100);

                        swal({
                             title: 'Successfully Added!',
                             type: 'success',
                             confirmButtonColor: '#43A047',
                             confirmButtonText: 'OK',
                             closeOnConfirm: false
                        },

                        function(isConfirm)
                        {
                            if (isConfirm) 
                            {
                                window.location=window.location; 
                            }
                        });

                        setTimeout(function() 
                        {
                            window.location=window.location;
                        }, 2500);

                        // window.location.reload();
                    },

                    error: function (response) 
                    {
                      swal({
                            title: 'Update Failed!',
                            text: 'Please try again.',
                            confirmButtonText: 'Okay',
                            confirmButtonColor: 'red'
                      });

                        setTimeout(function() 
                        {
                            window.location=window.location;
                        }, 5000);
                    }

            });
        });
*/


        
    });
    </script>

</body>
</html>
