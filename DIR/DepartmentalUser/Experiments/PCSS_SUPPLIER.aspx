

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Supplier</title>
    <link href="../../bs3/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet"/>
    <link href="../../css/bootstrap-reset.css" rel="stylesheet"/>
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="../../js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet"/>
    <link href="../../css/clndr.css" rel="stylesheet"/>
    <link href="../../js/css3clock/css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../js/morris-chart/morris.css"/>
    <link href="../../css/style.css" rel="stylesheet"/>
    <link href="../../css/style-responsive.css" rel="stylesheet" />
    <link href="../../js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="../../js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../js/data-tables/DT_bootstrap.css" />
    <link href="../../bs3/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet"/>
    <link href="../../css/bootstrap-reset.css" rel="stylesheet"/>
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="../../js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet"/>
    <link href="../../css/clndr.css" rel="stylesheet"/>
    <link href="../../js/css3clock/css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../js/morris-chart/morris.css"/>
    <link href="../../css/style.css" rel="stylesheet"/>
    <link href="../../css/style-responsive.css" rel="stylesheet" />
    <link href="../../js/sweetalert/sweetalert.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet"/>
    <link href="../../css/style-responsive.css" rel="stylesheet" />
</head>
<body>
    
    <section id="container">
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="PCSS_SUPPLIER.aspx" class="logo">
                <img src="../../images/PUP/webdev.png" alt="" style="width: 90%; height: 25%;"/>
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search"/>
                </li>                
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="../../images/EmployePictures/bryanprofilepic.jpg"/>
                <span class="username">Property Custodian</span>
                <b class="caret"></b>
                        </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="../login.php"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>

            <asp:Label runat="server" style="padding-left: 30px; font-size:25px;  font-family:'Agency FB';">
               MT: Property Management System
            </asp:Label>
            <!--search & user info end-->
        </div>
    </header>
    </section>

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
                            <li><a href="PCSS_ITEM.aspx">Item</a></li>
                            <li class="active"><a href="PCSS_SUPPLIER.aspx">Supplier</a></li>
                            <li><a href="PCSS_UNIT.aspx">Unit</a></li>
                            <li><a href="PCSS_MOP.aspx">Mode Of Procurement</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;">
                            <i class="fa  fa-upload"></i>
                            <span>Transaction</span>
                        </a>
                        <ul class="sub">
                            <li><a href="../OfficeUser/OUT_PR.aspx">Purchase Request</a></li> 
                            <li><a href="PR_PropCust.aspx">Purchase Order</a></li>    
                            <li><a href="#">Inspection and Acceptance Report</a></li>
                            <li><a href="#">Inventory</a></li>
                            <li><a href="#">Property Acknowledgement Report</a></li>
                            <li><a href="#">Property Transfer Report</a></li>

                        </ul>
                    </li>                
                    <li>
                        <a href="javascript:;">
                            <i class="fa  fa-book"></i>
                            <span>Queries</span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Property Card</a></li>     
                            <li><a href="#">List of Fixed Assets</a></li>
                            <li><a href="#">List of Property/ Plant/ Equipment</a></li>           
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa  fa-book"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Purchase Request</a></li>     
                            <li><a href="#">Purchase Order</a></li>
                            <li><a href="#">Inspection and Acceptance Report</a></li>
                            <li><a href="#">Property Acknowledgement Report</a></li>
                            <li><a href="#">Property Card</a></li>
                            <li><a href="#">Property Transfer Report</a></li>
                            <li><a href="#">List of Fixed Assets</a></li>
                            <li><a href="#">List of Property/ Plant/ Equipment</a></li>           
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a><i class="fa fa-wrench"></i> System Setup</a></li>
                        <li><a>Supplier</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Supplier
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <%--<select>
                                <asp:PlaceHolder ID = "getthemop" runat="server" />
                            </select>--%>

                            <div class="adv-table editable-table ">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="editable-sample_new" class="btn btn-success add" data-toggle="modal" data-target="#Add">
                                            Add New
                                        </button>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th class="hidden">ID</th>
                                            <th>Supplier's Name</th>
                                            <th>Supplier's Address</th>
                                            <th>Supplier's TIN</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <asp:PlaceHolder ID="tblbody" runat="server" />
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- MODALS -->

            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Add" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                         <form id="form_data" runat="server">
                            <asp:HiddenField ID="txtgetname" runat="server" />

                            <div class="modal-header" style="background-color: #ad0e0e; color: white;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Add New Supplier</h4>
                            </div>
                            <div class="modal-body">
                   
                                <div class="row" style="padding-left:15px;padding-top:10px">                                    
                                    <div class="col-lg-12">
                                       Supplier Name
                                        <input type="text" id="txtsuppname"  class="form-control" style="color: black;" placeholder="" runat="server"/>
                                    </div>                              
                                </div>

                                <div class="row" style="padding-left:15px;padding-top:10px">                                    
                                    <div class="col-lg-12">
                                       Supplier Address
                                        <input type="text" id="txtsuppaddress"  class="form-control" style="color: black;" placeholder="" runat="server"/>
                                    </div>                              
                                </div>

                                <div class="row" style="padding-left:15px;padding-top:10px">                                    
                                    <div class="col-lg-12">
                                       Supplier TIN
                                        <input type="text" id="txtsupptin"  class="form-control" style="color: black;" placeholder="" runat="server"/>
                                    </div>                              
                                </div>
                        
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" id="close" type="button">Close</button>
                                <button id="btnsubmit" class="btn btn-success " type="button"   >Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </section>

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>  
    <script src="../../js/jquery-1.8.3.min.js"></script>
    <script src="../../bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="../../js/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="../../js/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../js/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="../../js/sweetalert/sweetalert.min.js"></script>

    <!--common script init for all pages-->
    <script src="../../js/scripts.js"></script>

    <!--script for this page only-->
    <script src="SUPPLIER.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            EditableTable.init();
        });
    </script>

</body>
</html>
