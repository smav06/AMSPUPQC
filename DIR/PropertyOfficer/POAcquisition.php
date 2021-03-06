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
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="../../images/favicon.png">

    <title>Acquisition</title>

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
     <?php include 'POProfileModal.php'; ?> 
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
            <a data-toggle="dropdown" class="dropdown-toggle dt" href="#">
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

                echo '<ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 450px;">
            </ul>';
            ?>

        </li>
        <!-- notification dropdown end -->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle dt2" href="#">
                <i class="fa fa-warning"></i>
                <span class="badge bg-warning count2"></span>
            </a>

            <?php 

                $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXX FROM `ams_t_report_of_damage` AS ROD WHERE ROD.ROD_STATUS = 'Pending'");

                while($rowx = mysqli_fetch_assoc($sqlcntx))
                {
                    $cnt = $rowx['XXX'];
                    echo '<input type="text" class="hidden" id="cntofreqs" value="'.$cnt.'" />';
                }

                echo '<ul class="dropdown-menu extended notification dispnotif2" style="overflow-y: scroll; height: 390px;">
            </ul>';
            
            ?>

        </li>

        <!-- COPY NYO TO SA IBA MICA -->
        <?php include 'UrgentNotifUI.php'; ?>


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
                <!-- <li><a href="POPPMP.php">PPMP</a></li>                  -->
            </ul>
        </li>
        <li>
            <a href="POAcquisition.php" class="active">
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
                <li><a href="POMaintenanceJobOrder.php">Job Order</a></li>                        
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
                <!-- <li><a href="POPPMPReport.php">PPMP Report</a></li>    -->
                <li><a href="POPropertyAccountabilityReceipt.php">Property Accountability Receipt</a></li>
                <li><a href="POPropertyTransferReport.php">Property Transfer Report</a></li>
                <li><a href="POJobOrder.php">Job Order</a></li>   
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
                        <li><a href="POAcquisition.php">Acquisition</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="height: 95px;">      

                            <div class="row group">                                                       
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Select acquisition type: </label>
                                        <select class="form-control" style="color: black;" id="getsel">
                                            <option selected value="Donation">From Donation</option>
                                            <option value="Requests">From Request</option>
                                            <!-- <option value="PPMP">From PPMP</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <span class="tools pull-right" style="margin-top: -70px;">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                            </span>
                        </header>

                        <div class="panel-body" id="pnldonation">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td> 
                                        <form action="InsertDonation.php" method="post" id="pnldonationdelay">

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
                                            
                                                <div class="row group">                                                        
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Asset Type</label>
                                                            <select name="AL_ID[]" id="AL_IDgg[]" class="form-control" required="" style="color: black;">

                                                                <option selected disabled value=""></option>

                                                                <?php  

                                                                    $sqlx = "SELECT * FROM `ams_r_asset_library`";

                                                                    $resx = mysqli_query($connection, $sqlx) or die("Bad Query: $sql");

                                                                    while($rowx = mysqli_fetch_assoc($resx))
                                                                    {
                                                                        $alname = $rowx['AL_NAME'];
                                                                        $alid = $rowx['AL_ID'];

                                                                ?>

                                                                    <option value="<?php echo $alid; ?>"><?php echo $alname; ?></option>

                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>

                                                                <!-- testing ko ng at_id -->

                                                                <!-- <label>Date Acquired</label>
                                                                <input name="place" value="" class="form-control" style="color: black;"/> -->

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date Acquired</label>
                                                            <input style="color: black; padding-right: 2px;" type="date" name="A_DATE[]" id="A_DATEgg[]" class="form-control" required="" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-danger btnRemove" style="margin-top: 23px;">Remove</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Asset Description</label>
                                                            <textarea name="A_DESCRIPTION[]" id="A_DESCgg[]" maxlength="250" class="form-control" required="" style="color: black; height: 80px;"></textarea>
                                                        </div>
                                                    </div>

                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            
                                            <p> <button type="submit" class="btn btn-success" onclick="delaySubmit(); return false;" id="btnsubmitthedonation"> Submit </button> </p>
                                        </form>  
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="panel-body hidden" id="pnlrequests">                            
                            <div class="form-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Enter Purchase Request Number</label>
                                        <input style="color: black;" maxlength="15" type="text" class="form-control" id="inpprno" required />
                                    </div>

                                    <div class="col-md-3">
                                        <label></label>
                                        <h4 id="checkinggg" style="color: red;"></h4>
                                        <!-- <input style="color: black;" type="text" class="form-control" id="checkinggg" required /> -->
                                    </div>

                                    <br/>

                                    <!-- <div class="col-md-4" style="margin-top: 22px;">
                                        <button type="button" class="btn btn-success" id="btnfrompurchaserequest">Submit</button>
                                    </div> -->                                    
                                </div>
                                
                                <br>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Date Requested</label>
                                        <input style="color: black;" type="date" class="form-control" required="" disabled="" />
                                    </div>

                                    <div class="col-md-4">
                                        <label>Requested By</label>
                                        <input style="color: black;" type="text" class="form-control" id="inpreqby" required="" disabled="" />
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="form-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="showtherequestdata">
                                
                            </div>

                        </div>

                        <!-- <div class="panel-body hidden" id="pnlppmp">
                            PANEL PPMP
                        </div> -->

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

    <script type="text/javascript">

        $(document).ready(function() {

            $('#btnfrompurchaserequest').click(function() {

                var inpprnos = document.getElementById('inpprno').value;

                alert(inpprnos);
            });

        });

    </script>

</body>
</html>

<script type="text/javascript">
    function handleSubmit(){
          document.getElementById("pnldonationdelay").submit();
    }
 
    function delaySubmit(){ 
        if (document.getElementById("AL_IDgg[]").value == '') 
        {
            document.getElementById("AL_IDgg[]").focus();
        }
        else if(document.getElementById("A_DESCgg[]").value == '') 
        {
            document.getElementById("A_DESCgg[]").focus();
        }
        else if(document.getElementById("A_DATEgg[]").value == '' || document.getElementById("A_DATEgg[]").value == 'mm/dd/yyy' || document.getElementById("A_DATEgg[]").value == null || document.getElementById("A_DATEgg[]").value == '00/00/0000')     
        {
            document.getElementById("A_DATEgg[]").focus();
        }
        else
        {
            swal("Insert Successful!", "Asset is successfully acquired.", "success");
            window.setTimeout(handleSubmit, 2500); 
        }
    };
</script>

<script>

function myFunction(id) {
     var id = id;
     // alert(id);

     $.ajax({
        type: 'POST',
        url: 'UpdateNotifByClicked.php',
        async: false,
        data: {
            _id: id
        },
        success: function(data2) {
            // alert(data2);                              
            // alert("tama");
        },
        error: function(response2) {
            // alert(response2);  
            // alert("mali");                                
        }

    });
}

function myFunction2(id) {
     var id = id;
     // alert(id);

     $.ajax({
        type: 'POST',
        url: 'UpdateNotifByClickedReport.php',
        async: false,
        data: {
            _id: id
        },
        success: function(data2) {
            // alert(data2);                              
            // alert("tama");
        },
        error: function(response2) {
            // alert(response2);  
            // alert("mali");                                
        }

    });
}

function myFunction3(id) {
     var id = id;
     // alert(id);

     $.ajax({
        type: 'POST',
        url: 'UpdateNotifByClickedUrgent.php',
        async: false,
        data: {
            _id: id
        },
        success: function(data2) {
            // alert(data2);                              
            // alert("tama");
        },
        error: function(response2) {
            // alert(response2);  
            // alert("mali");                                
        }

    });
}

$(document).ready(function(){

    // KEYPRESS NG PR NO
    $(function(){

        $('#inpprno').on('input',function(){                        

            var inpprnos = document.getElementById('inpprno').value;
            // alert(inpprnos);

            if (document.getElementById('inpprno').value == '') 
            {
                document.getElementById('checkinggg').value = '';
                document.getElementById('checkinggg').innerHTML = '';
                document.getElementById('inpreqby').value = '';
            }
            else
            {
                $.ajax({
                    type: 'POST',
                    url: 'AjaxGetDataOfPurchaseRequest.php',
                    async: false,
                    data: {
                        _id: inpprnos
                    },
                    success: function(data2) {
                        // alert(data2);                              
                        // alert("tama");

                        if (data2 == 'NO DATA') 
                        {
                            document.getElementById('checkinggg').value = 'NO DATA';
                            document.getElementById('checkinggg').innerHTML = 'NO DATA';
                            document.getElementById('inpreqby').value = '';

                            document.getElementById('showtherequestdata').innerHTML = '';
                        }
                        else
                        {
                            document.getElementById('inpreqby').value = data2;
                            document.getElementById('checkinggg').value = '';
                            document.getElementById('checkinggg').innerHTML = '';

                            document.getElementById('showtherequestdata').innerHTML = 'HAHAHAHA';
                        }             

                    },
                    error: function(response2) {
                        // alert(response2);  
                        // alert("mali");                                
                    }

                });
            }

        });
    });
 
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
     
    $(document).on('click', '.dt', function() {
        $('.count').html('');
        load_unseen_notification('yes');
    });
     
    setInterval(function(){ 
        load_unseen_notification();; 
    }, 1000);

    //START

    $('#getsel').change(function(e) {

        var e = document.getElementById('getsel');

        if (document.getElementById('getsel').options[e.selectedIndex].value == 'Donation') 
        {
            $('#pnldonation').removeClass('hidden');
            $('#pnlrequests').addClass('hidden');
            // $('#pnlppmp').addClass('hidden');
        }
        else if (document.getElementById('getsel').options[e.selectedIndex].value == 'Requests') 
        {
            $('#pnldonation').addClass('hidden');
            $('#pnlrequests').removeClass('hidden');
            // $('#pnlppmp').addClass('hidden');
        }
        else if (document.getElementById('getsel').options[e.selectedIndex].value == 'PPMP') 
        {
            $('#pnldonation').addClass('hidden');
            $('#pnlrequests').addClass('hidden');
            // $('#pnlppmp').removeClass('hidden');
        }

    });


 
});
</script>

<script type="text/javascript">

    $(document).ready(function(){
 
        function load_unseen_notification2(view2 = '') {
            $.ajax({
                url:"fetchreport.php",
                method:"POST",
                data:{view2:view2},
                dataType:"json",
           
            success:function(data2)
            {
                $('.dispnotif2').html(data2.notification2);

                if(data2.unseen_notification2 > 0)
                {
                    $('.count2').html(data2.unseen_notification2);
                }
            }

            });
        }
         
        load_unseen_notification2();
         
        $(document).on('click', '.dt2', function() {
            $('.count2').html('');
            load_unseen_notification2('yes');
        });
         
        setInterval(function(){ 
            load_unseen_notification2();; 
        }, 1000);
     
    });

</script>

<script type="text/javascript">

    $(document).ready(function(){
 
        function load_unseen_notification3(view3 = '') {
            $.ajax({
                url:"fetchurgent.php",
                method:"POST",
                data:{view3:view3},
                dataType:"json",
           
            success:function(data3)
            {
                $('.dispnotif3').html(data3.notification3);

                if(data3.unseen_notification3 > 0)
                {
                    $('.count3').html(data3.unseen_notification3);
                }
            }

            });
        }
         
        load_unseen_notification3();
         
        $(document).on('click', '.dt3', function() {
            $('.count3').html('');
            load_unseen_notification3('yes');
        });
         
        setInterval(function(){ 
            load_unseen_notification3();; 
        }, 1000);
     
    });

</script>
