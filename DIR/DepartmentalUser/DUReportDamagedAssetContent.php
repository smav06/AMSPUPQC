<?php

    include('../Connection/db.php');

    session_start();

    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype']) == 'Property Officer' && !isset($_SESSION['myuser'])  && !isset($_SESSION['myid']) && !isset($_SESSION['myoid']))
    {
      echo "<script>window.location.assign('../login.php')</script>";

    }

    if (isset($_GET['receiverodid'])) 
    {
        $ids = $_GET['receiverodid'];
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css" media="print">
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
    </style>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="../../images/favicon.png">

    <title>RDA</title>

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
                        <li><a href="DURpmpRequest.php">PPMP Request</a></li>                    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="active">
                        <i class="fa fa-list"></i>
                        <span>Queries</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a href="DUReportDamagedAsset.php">Reported Damaged Asset</a></li>
                        <li><a href="DUReportForTransfer.php">Released Asset</a></li>                  
                        <li><a href="DUListOfRequest.php">List Of Request</a></li>
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
                        <li><a href="DUReportDamagedAsset.php">Reported Damaged Asset</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Reported Damaged Assets
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="row group">
                                <div class="col-md-12">
                                    <div class="adv-table">
                                        <table class="display table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Assets</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php  
                                                $sql1 = "SELECT * FROM `ams_r_asset` AS A INNER JOIN `ams_t_report_of_damage_sub` AS RODS 
                                                ON RODS.A_ID = A.A_ID WHERE RODS.ROD_ID = $ids";

                                                $result1 = mysqli_query($connection, $sql1) or die("Bad Query: $sql");

                                                while($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                    $adesc = $row1['A_DESCRIPTION'];
                                            ?>
                                                <tr>
                                                    <td> <?php echo $adesc; ?> </td>
                                                </tr>

                                            <?php
                                                }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <span class="pull-right">
                                <a class="btn btn-default" href="DUReportDamagedAsset.php">Back</a>
                            </span>
                            
                        </div>


                        
                    </section>
                </div>
            </div>
        </section>
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

    </script>    

    <!-- REPORT NOTIF -->
    <?php include 'ReportNotif.php'; ?> 

    <!-- REPORT CLICKED STATUS -->
    <?php include 'ReportNotifClickedBtnScript.php'; ?> 

</body>
</html>

<script>

$(document).ready(function(){

    // btnsubmitthedonation

    // $('#btnsubmitthedonation').click(function(e) {
    //     // alert();
    // });
 
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

<script>

    function printonly() {

        var restorepage = document.body.innerHTML;
        var printcont = document.getElementById('printdisbook').innerHTML;
        document.body.innerHTML = printcont;
        window.print();
        document.body.innerHTML = restorepage;

            setTimeout(function() 
            {
                window.location = window.location;
            }, 100);

    }

</script>