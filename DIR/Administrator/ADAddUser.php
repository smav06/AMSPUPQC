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

    <title>Add User</title>

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

                <span class="username"> <?php echo $_SESSION['mysesi']; ?> <label> | Administrator</label> </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="ADprofile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
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
                        <li><a href="ADAssetCategory.php">Asset Category</a></li>
                        <li><a href="ADAssetUnit.php">Asset Unit</a></li>
                        <li><a href="ADRequestingPerson.php">Disposal Location</a></li>  
                    </ul>
                </li>
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-gears"></i>
                        <span>Configuration</span>
                    </a>
                    <ul class="sub">
                        <li><a href="ADPpmp.php">PPMP</a></li>  
                    </ul>
                </li> -->
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
                        <li><i class="fa fa-user"></i><strong> &nbsp;User Management</strong></li>
                        <li><strong>Users</strong></li>
                        <li><strong>Add User</strong></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>

                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add User
                        </header>
                            
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <label style="margin-left: 248px;">Middle Initial</label>
                                        <label style="margin-left: 84px;">Last Name</label>
                                        <label style="margin-left: 249px;">Nickname (For Username)</label>
                                        <input type="text" class="form-control" id="inputFN" style="color: black; width: 300px;">
                                        <input type="text" class="form-control" id="inputMI" style="color: black; width: 150px; margin-left: 315px; margin-top: -34px;">
                                        <input type="text" class="form-control" id="inputLN" style="color: black; width: 300px; margin-left: 480px; margin-top: -34px;">
                                        <input type="text" class="form-control" id="inputNick" style="color: black; width: 205px; margin-left: 795px; margin-top: -34px;">
                                    </div>

                                    <div class="form-group">
                                        <label>Department</label>
                                        <label style="margin-left: 742px;">Role</label>
                                        <select class="form-control m-bot15" id="selectDept" onfocus="" onblur="" style="color: black; width: 800px;">

                                            <option selected disabled></option>

                                            <?php  

                                            $sqlforemployee = "SELECT O_CODE, O_ID FROM ams_r_office";

                                            $results = mysqli_query($connection, $sqlforemployee) or die("Bad Query: $sql");

                                            while($row = mysqli_fetch_assoc($results))
                                            {
                                                $deptCode = $row['O_CODE'];
                                                $deptID = $row['O_ID'];

                                            ?>

                                            <option value= "<?php echo $deptID ?>"> <?php echo "$deptCode"; ?> </option>

                                            <?php 
                                                } 
                                            ?>

                                            </select>

                                        <select class="form-control m-bot15" id="selectType" onfocus="" onblur="" style="color: black; width: 185px; margin-left: 815px; margin-top: -48px;">
                                            <option selected disabled></option>
                                            <option value="Male">Administrator</option>
                                            <option value="Female">Property Officer</option>
                                            <option value="Female">Departmental User</option>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <label style="margin-left: 527px;">Contact No.</label>
                                        <label style="margin-left: 192px;">Gender</label>
                                        <input type="email" class="form-control" id="inputEmail" style="color: black; width: 600px;">
                                        <input type="text" class="form-control" id="inputCont" style="color: black; width: 250px; margin-left: 615px; margin-top: -33px;">
                                        <select class="form-control m-bot15" id="selectGender" onfocus="" onblur="" style="color: black; width: 122px; margin-left: 880px; margin-top: -33px;">
                                            <option selected disabled></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <label style="margin-left: 447px;">Password</label>

                                        <?php

                                            $bytes = openssl_random_pseudo_bytes(4);

                                            a:
                                            $pwd = bin2hex($bytes);

                                            $sql = "SELECT * FROM ams_r_user WHERE U_PASSWORD = '".$pwd."'";

                                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                            if (mysqli_num_rows($result) > 0) 
                                            {
                                                goto a;
                                            }

                                        ?>

                                        <input type="text" class="form-control" id="uname" style="color: black; width: 495px;" disabled>
                                        <input type="password" class="form-control" id="password" style="color: black; width: 495px; margin-left: 510px; margin-top: -34px;" value="<?php echo $pwd; ?>" disabled>
                                    </div>

                                    <div class="checkbox">
                                        <label style="float: right;">
                                            <input type="checkbox" id="showPass" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show Password
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="img">
                                    </div>

                                    <button type="button" class="btn btn-success">Submit</button>

                                </form>
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
        
/*        function generateUsername(deptName)
        {

            document.getElementByID('uname').value = document.getElementByID('selectDept').innerHTML + "-" + document.getElementByID('inputNick').value;
            alert(document.getElementByID('try').value);

        }
*/

        $('#selectDept').change(function()
        {
            var val = $("#selectDept option:selected").text().trim();
            document.getElementById('uname').value = val + "-" + document.getElementById('inputNick').value.toUpperCase();
        }
        );



    </script>

</body>
</html>
