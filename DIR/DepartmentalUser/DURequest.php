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
                        Request an asset
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
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

                                                ?>

                                                <div class="form-group">
                                                    <label>Purpose Of Request</label>
                                                    <input type="hidden" name="currentdate" value="<?php echo date('Y-m-d') ?>">
                                                    <!-- <input type="text" name="urs_purpose" class="form-control" required="" maxlength="200" style="color: black;" /> -->
                                                    <textarea class="form-control" name="urs_purpose" required="" style="resize: none; color: black;" maxlength="200"></textarea>
                                                    <input type="hidden" name="currentempid" value="<?php echo $_SESSION['myid'] ?>">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row group">                                                        
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Asset Description</label>
                                                            <input maxlength="150" type="text" name="UR_DESCRIPTION[]" class="form-control" required="" style="color: black;" maxlength="150" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Asset Type</label>
                                                            <select name="AT_ID[]" class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>

                                                            <?php  
                                                                $sqlgetasttype = "SELECT * FROM `ams_r_asset_type` ";

                                                                $results = mysqli_query($connection, $sqlgetasttype) or die("Bad Query: $sql");

                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $asttypeid = $row['AT_ID'];
                                                                    $asttypename = $row['AT_NAME'];

                                                            ?>

                                                                <option value="<?php echo $asttypeid ?>"><?php echo "$asttypename"; ?></option>

                                                            <?php 
                                                                } 
                                                            ?>

                                                            </select>

                                                            <!-- <label>Logic ko asset type with id</label>
                                                            <input name="asttypesss" value="" class="form-control" style="color: black;"/> -->

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Unit</label>
                                                            <select name="UR_UNIT[]" class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                <option value="<?php echo $finalid.$_SESSION['myid'] ?>Piece">Piece</option>
                                                                <option value="<?php echo $finalid.$_SESSION['myid'] ?>Set">Set</option>
                                                                <option value="<?php echo $finalid.$_SESSION['myid'] ?>Bundle">Bundle</option>
                                                            </select>

                                                            <!-- <label>Logic ko sa unit</label>
                                                            <input name="place" value="" class="form-control" style="color: black;"/> -->

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input style="color: black; padding-right: 2px;" type="number" name="UR_QUANTITY[]" class="form-control" required="" minlength="3" min="1" max="100" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Request By</label>
                                                            <select name="EP_ID[]" class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                <!-- <option value="<?php echo $finalid.$_SESSION['myid'] ?>Piece">Piece</option>
                                                                <option value="<?php echo $finalid.$_SESSION['myid'] ?>Set">Set</option>
                                                                <option value="<?php echo $finalid.$_SESSION['myid'] ?>Bundle">Bundle</option> -->

                                                            <?php  

                                                                $getoffice = $_SESSION['myoid'];

                                                                $sqlforemployee = "SELECT * FROM `ams_r_employee_profile` WHERE O_ID = $getoffice";

                                                                $results = mysqli_query($connection, $sqlforemployee) or die("Bad Query: $sql");

                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $fname = $row['EP_FIRST_NAME'];
                                                                    $mname = $row['EP_MIDDLE_NAME'];
                                                                    $lname = $row['EP_LAST_NAME'];
                                                                    $wholename = $fname.' '.$mname.' '.$lname;
                                                                    $epid = $row['EP_ID'];

                                                            ?>

                                                                <option value="<?php echo $epid ?>"><?php echo "$wholename"; ?></option>

                                                            <?php 
                                                                } 
                                                            ?>

                                                            </select>

                                                            <!-- testing ko ng at_id -->

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
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>

                                            <!-- <div class="row group">
                                                <div class="col-md-12">
                                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                    </div>
                                                </div>
                                            </div> -->
                                            
                                            <p><button type="submit" class="btn btn-success" name="insertonly">Submit</button></p>

                                        </form>  
                                    </td> 
                                </tr>
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


        $('#qweqwe').click(function(){

            var getpurposerequest = document.getElementById('getpurposerequest').value;
            var getdesc = document.getElementById('getdesc').value;
            var gettype = document.getElementById('gettype').value;
            var getunit = document.getElementById('getunit').value;
            var getqty = document.getElementById('getqty').value;
            var getreqby = document.getElementById('getreqby').value;

            if ((getpurposerequest == "")) 
            {
                
            }
            else if((getdesc == ""))
            {
                
            }
            else if((gettype == ""))
            {
                
            }
            else if((getunit == ""))
            {
                
            }
            else if((getqty == ""))
            {
                
            }
            else if((getreqby == ""))
            {
                
            }
            else
            {
                swal("", "You clicked the button!", "success");
            }
            
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
                imageUrl: '../../images/favicon/apple-touch-icon-152x152.png'
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
        
    });
    </script>

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

    </script>



</body>
</html>
