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

    <title>Asset Unit</title>

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
                        <li><a href="ADDepartment.php">Department</a></li>
                        <li><a href="ADAssetType.php">Asset Library</a></li>
                        <li><a href="ADAssetCategory.php">Asset Category</a></li>
                        <li class="active"><a href="ADAssetUnit.php">Asset Unit</a></li>
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
                        <li><a href="ADPtr.php">Property Transfer Report</a></li> 
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
                        <li><i class="fa fa-wrench"></i><strong> &nbsp;System Setup</strong></li>
                        <li><strong>Asset Unit</strong></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            List of Units
                        </header>

                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <a data-toggle="modal" class="btn btn-success" href="#myModalAdd"><i class="fa fa-plus" style="font-color"></i></a>
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
                                            <th style="display: none;">Unit ID</th>
                                            <th style="width: 900px">Unit</th>
                                            <th style="width: 70px">Action</th>  
                                        </tr>
                                    </thead>

                                    <tbody>  

                                    <?php  

                                        $sql = "SELECT * FROM ams_r_asset_unit";

                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                        while($row = mysqli_fetch_assoc($result))
                                            {
                                              $id = $row['UNT_ID'];
                                              $unit = $row['UNT_NAME'];    
                                    ?>                                      

                                        <tr class="gradeX"">
                                            <td style="display: none;"> <?php echo $id; ?> </td>
                                            <td> <?php echo $unit; ?> </td>
                                            <td>
                                                <a data-toggle="modal" class="btn btn-success updateCampus" href="#myModalUpdate<?php echo $id ?>"><i class="fa fa-pencil"></i></a>
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
                                                                <label><strong>Category</strong></label>
                                                                <input style="color: black;" type="text" onfocus="inputCcodeOnClick(<?php echo $id ?>)" onblur="inputCcodeOnLeave(<?php echo $id ?>)" class="form-control" id="inputCcode<?php echo $id ?>" value="<?php echo $unit; ?>"/>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;"></div>
                                                                </div>
                                                            </div>
            
                                                            <button class="btn btn-success" onclick="btnSubmitForUpOnClick(<?php echo $id ?>)" id="btnSubmitForUp" style="margin-left: 380px; margin-bottom: -10px" type="button">Save Changes</button>
                                                            <button data-dismiss="modal" class="btn btn-default" onclick="onClose()" style="float: right;" type="button">Close</button>

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
                        <label><strong>Unit</strong></label>
                        <input style="color: black;" onfocus="addcampuscodeOnClick()" onblur="addcampuscodeOnLeave()" type="text" class="form-control" id="addcampuscode"/>
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
            // window.location = window.location;
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

            if (document.getElementById('addcampuscode').value != "Empty Fields are not allowed.") 
            {
                var unit = document.getElementById('addcampuscode').value;

                swal(
                {
                    title: "Warning!",
                    text: "This transaction can't be undone. Are you sure you want to do it?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#43A047',
                    confirmButtonText: 'YES',
                    cancelButtonText: "NO",
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
                                url : 'insertunit.php',
                                data: 
                                {
                                    _unit: unit

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
                            }  
                            );
                                        
                        }//endelse{}
                    }
                );//endswal()
            }//endif{}            
        }//endfunc()

        function btnSubmitForUpOnClick(modId)
        {
            if (document.getElementById('inputCcode' + modId).value == "" || document.getElementById('inputCcode' + modId).value == "Empty Fields are not allowed.") 
            {
                document.getElementById('inputCcode' + modId).value = "Empty Fields are not allowed."
                document.getElementById('inputCcode' + modId).style.color = "red";
                document.getElementById('inputCcode' + modId).style.backgroundColor = "#ffffcc";
                document.getElementById('inputCcode' + modId).style.borderColor = "red";
            }

            if (document.getElementById('inputCcode' + modId).value != "Empty Fields are not allowed.") 
            {
                var upUnit = document.getElementById('inputCcode' + modId).value;
                var uniqueId = modId;

                swal(
                {
                    title: "Warning!",
                    text: "This transaction can't be undone. Are you sure you want to do it?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#43A047',
                    confirmButtonText: 'YES',
                    cancelButtonText: "NO",
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
                                url : 'updateunit.php',
                                data: 
                                {
                                    _upUnit: upUnit,
                                    _uniqueId: uniqueId

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
        }//endfunc{}

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

        function inputCcodeOnClick(modId)
        {
            if (document.getElementById('inputCcode' + modId).value == "Empty Fields are not allowed.")
            {
                document.getElementById('inputCcode' + modId).value = "";
                document.getElementById('inputCcode' + modId).style.color = "black";
                document.getElementById('inputCcode' + modId).style.backgroundColor = "white";
                document.getElementById('inputCcode' + modId).style.borderColor = "#00A8B3";
            }
        }

        function addcampuscodeOnLeave()
        {
            document.getElementById('addcampuscode').style.borderColor = "#E2E2E4";
        }

        function inputCcodeOnLeave(modId)
        {
            document.getElementById('inputCcode' + modId).style.borderColor = "#E2E2E4";
        }

    </script>   

</body>
</html>
