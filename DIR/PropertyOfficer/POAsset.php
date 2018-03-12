<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser']) && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
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
    <title>Assets</title>
    
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
<section id="container">
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
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning count"></span>
            </a>
            <ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 375px;">
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
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
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
                    <a class="active" href="POAsset.php">
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
                        <li><a href="POPPMP.php">PPMP Request</a></li>  
                        <li><a href="PORequestToMain.php">Request To Main</a></li>                 
                    </ul>
                </li>
                <li>
                    <a href="POAcquisition.php">
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
                        <li><a href="POMaintenanceYearly.php">[ Maintenance Yearly ]</a></li>
                        <li><a href="POMaintenanceReport.php">Report Of Damage</a></li>                        
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
                        <li><a href="PORequestSlip.php">Request Slip</a></li> 
                        <li><a href="POPPMPReport.php">PPMP Report</a></li>   
                        <li><a href="POPar.php">Property Accountability Receipt</a></li>
                        <li><a href="POPtr.php">Property Transfer Report</a></li>   
                        <li><a href="PORod.php">Report Of Damage</a></li>  
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

<!--mini statistics start-->
<div class="row ">
    <div class="col-md-3 hidden">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="daily-visit">
                        <div id="daily-visit-chart" style="width:100%; height: 100px; display: block">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3 hidden">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="sm-pie">
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!--mini statistics end-->
<div class="row hidden">
    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <div class="panel-body">

                <div id="graph-area" class="main-chart">
                </div>
            </div>
        </section>
        <!--earning graph end-->
    </div>
    <div class="col-md-4">
    </div>
</div>
<!--mini statistics start-->
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="PODashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="POAsset.php">Asset</a></li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Assets
            </header>

            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th style="width: 70px;">ID</th>
                                <th style="width: 90px">Select</th>
                                <th style="width: 140px;">Acquisition Type</th>
                                <th style="width: 100px;">Status</th> 
                                <th style="word-wrap: break-word;">Description</th>                                
                                <th style="width: 130px;">Date Acquired</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php  

                            $sql = "SELECT * FROM `ams_r_asset` ORDER BY A_DATE DESC";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            $i = 0;

                            while($row = mysqli_fetch_assoc($result))
                            {
                                $i++;                                
                                $a_id = $row['A_ID'];
                                $a_description = $row['A_DESCRIPTION'];    
                                $a_acquistion_type = $row['A_ACQUISITION_TYPE'];                           
                                $a_date = $row['A_DATE'];
                                $a_status = $row['A_STATUS'];
                                $a_availability = $row['A_AVAILABILITY'];
                        ?>

                            <tr class="gradeX" id="hahaha1<?php echo $i; ?>">

                                <?php
                                    if ($a_availability == 'Available') 
                                    {
                                ?>
                                        <td>
                                            <a id="getid<?php echo $i; ?>">
                                                <?php echo $a_id; ?>
                                            </a> 
                                        </td>                                

                                        <td>
                                            <center>                
                                                <input type="checkbox" id="chkvals<?php echo $i; ?>" class="checkbox form-control" style="width: 20px">
                                            </center>     
                                        </td>
                                <?php
                                    }
                                    elseif ($a_availability == 'Assigned') 
                                    {
                                ?>

                                        <td>
                                            <a id="getid<?php echo $i; ?>">
                                                <?php echo $a_id; ?>
                                            </a> 
                                        </td>                                

                                        <td>
                                            <center>                
                                                <input type="checkbox" id="chkvals<?php echo $i; ?>" class="checkbox form-control" style="width: 20px" disabled>
                                            </center>     
                                        </td>
                                <?php
                                    }
                                ?>

                                <td id="origtype<?php echo $i; ?>"> <?php echo $a_acquistion_type; ?> </td>
                                <td id="origstat<?php echo $i; ?>"> <?php echo $a_status; ?> </td>
                                <td id="origdesc<?php echo $i; ?>"> <?php echo $a_description; ?> </td>                                
                                <td id="origdate<?php echo $i; ?>"> <?php echo $a_date; ?> </td>                                
                            </tr>

                        <?php 
                            }                        
                        ?>    

                        <?php
                            $sql1 = "SELECT COUNT(*) AS AAA FROM `ams_r_asset`";

                            $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                            while($row1 = mysqli_fetch_assoc($result1))
                            {
                                $cnt = $row1['AAA'];
                        ?>

                            <input type="text" class="hidden" id="countthetable" value="<?php echo $cnt; ?>">

                        <?php
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
<!--mini statistics end-->

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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalAssign" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #8C1C1C; color: white">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Assign Asset (PAR)</h4>
            </div>

            <div class="modal-body">
                
                <form role="form" method="POST" id="form-data3">
                    <div class="form-group">
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table tblmodal">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">ID</th>
                                        <th style="width: 140px;">Acquisition Type</th>
                                        <th style="width: 100px;">Status</th> 
                                        <th style="word-wrap: break-word;">Description</th>                                
                                        <th style="width: 130px;">Date Acquired</th>
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
                        <div class="form-group">
                            <label>Assign To:</label>
                            <select class="form-control" style="color: black;">
                                <option value="" disabled selected></option>

                                <?php  

                                    $sqlforemployee = "SELECT *, EP.EP_ID FROM `ams_r_employee_profile` AS EP LEFT JOIN `ams_r_user` AS U ON U.EP_ID = EP.EP_ID WHERE EP.EP_STATUS = 'Active' AND U.U_ROLE_CODE != 'Administrator' OR EP.EP_STATUS = 'Active' AND U.U_ROLE_CODE IS NULL";

                                    $results = mysqli_query($connection, $sqlforemployee) or die("Bad Query: $sql");

                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        $fname = $row['EP_FNAME'];
                                        $mname = $row['EP_MNAME'];
                                        $lname = $row['EP_LNAME'];
                                        $wholename = $fname.' '.$mname.' '.$lname;
                                        $epid = $row['EP_ID'];

                                ?>

                                <option value="<?php echo $epid ?>"><?php echo "$wholename"; ?></option>
                                
                                <?php
                                    }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date Assign:</label>
                            <input type="date" name="" class="form-control" style="color: black;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">                                                             
                        </div>
                    </div>
                </div>

                <button class="btn btn-success" id="" type="button">Assign</button>
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

<!--script for this page-->
</body>
</html>

<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
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
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 1000);
 
});
</script>


<script>
    $(document).ready(function() {

        $('#assignbtn').click(function() {

            document.getElementById('newmodalget').innerHTML = '';

            var getthecnt = document.getElementById('countthetable').value;
            var getcheckedconcat = '';
            var final = '';

            for (var i=1; i <=getthecnt; i++) {
            
                if (document.getElementById('chkvals'+i).checked) {

                    // var abc = document.getElementById('getid'+i).innerText;                    

                    // var getcheckedconcat = getcheckedconcat + abc + ',';

                    // var gege = '<tr>' + document.getElementById('hahaha1'+i).innerHTML + '</tr>';





                    var azxc = '<td id="modid' +i+ '">' + document.getElementById('getid'+i).innerText + '</td>';
                    // alert(azxc);

                    var bzxc = '<td id="modtype$i">' + document.getElementById('origtype'+i).innerText + '</td>';
                    // alert(bzxc);

                    var czxc = '<td id="modstat$i">' + document.getElementById('origstat'+i).innerText + '</td>';
                    // alert(czxc);

                    var dzxc = '<td id="moddesc$i">' + document.getElementById('origdesc'+i).innerText + '</td>';
                    // alert(dzxc);

                    var ezxc = '<td id="moddate$i">' + document.getElementById('origdate'+i).innerText + '</td>';                    
                    // alert(ezxc);

                    // alert('<tr>' + azxc + bzxc + czxc + dzxc + ezxc + '</tr>');
                    document.getElementById('newmodalget').innerHTML = document.getElementById('newmodalget').innerHTML + '<tr>' + azxc + bzxc + czxc + dzxc + ezxc + '</tr>'; 


                    // var final = final + gege;

                    // document.getElementById('newmodalget').innerHTML = final;

                    // alert(gege);

                    // alert('['+getcheckedconcat+']'); 

                    //START
                    // $.ajax({
                    //     type: "GET",
                    //     url: 'POAsset/AjaxGetDataPO.php',
                    //     dataType: 'json',
                    //     data: {
                    //         _getcheckedconcat: getcheckedconcat
                    //     },
                    //     success: function (data) {
                    //         document.getElementById('modrelqrcode').value = data.gg;
                    //     },
                    //     error: function (response) {
                    //         swal("Please naman!", "Gumana kana!", "error");
                    //     }

                    // });
                    //END


                }
            }

        });



    });
</script>