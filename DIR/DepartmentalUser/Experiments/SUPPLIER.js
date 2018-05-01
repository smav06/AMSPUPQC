var befsuppname = '';
var befsuppaddress = '';
var befsupptin = '';

var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {

            function restoreRow(oTable, nRow) {

                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            var getcode = '';

            function editRow(oTable, nRow) {

                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                var nRow = $(this).parents('tr')[0];
                befsuppname = aData[1];
                befsuppaddress = aData[2];
                befsupptin = aData[3];

                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '"  style="width:100%" >';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '" style="width:100%">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '"  style="width:100%" >';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '" style="width:100%">';
                jqTds[4].innerHTML = "<center><a class='btn btn-success edit' href='javascript:;'><i class='fa fa-save '></i></a> <a class='btn btn-danger cancel' href='javascript:;'><i class='fa fa-ban'></i></a></center>";

            }


            function saveRow(oTable, nRow) {

                var jqInputs = $('input', nRow);

                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate("<center><a class='btn btn-success  edit' href='javascript:;'><i class='fa fa-edit'></i></a> </center>", nRow, 4, false);
                oTable.fnDraw();
            }

            function saveEdit(oTable, nRow) {

                var jqInputs = $('input', nRow);

                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate("<center><a class='btn btn-success  edit' href='javascript:;'><i class='fa fa-edit'></i></a> </center>", nRow, 4, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="btn btn-success edit" href="">Edit</a>', nRow, 4, false);
                oTable.fnDraw();
            }

            var oTable = $('#editable-sample').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }
                ]
            });

            jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

            var nEditing = null;



            $('#editable-sample a.delete').live('click', function (e) {

                e.preventDefault();

                var nRow = $(this).parents('tr')[0];
                var getval = $(this).closest('tr').children('td:first').text();
                var getdesc = $(this).closest('tr').children('td:first').next().text();

                swal({

                    title: "Are you sure?",
                    text: "The record will be save and will be use for Semester",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, do it!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                    function (isConfirm) {
                        if (isConfirm) {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.open("GET", "Backend/Delete_SupportingDocument.aspx?code=" + getval, false);
                            xmlhttp.send(null);
                            swal("Record Deleted!", "The data is successfully deleted!", "success");
                            oTable.fnDeleteRow(nRow);
                            var aiNew = oTable.fnAddData([getval, getdesc, "<center><span class='badge bg-important ' style='padding:10px;'>Inactive</span></center>", "<center><a class='btn btn-info retrieve' href='javascript:;'><i class='fa fa-undo'></i></a></center>", '']);
                        }
                        else {
                            swal("Cancelled", "The transaction is cancelled", "error");
                        }
                    });
            });

            $('#btnsubmit').live('click', function (e) {

                var txtsuppname = document.getElementById('txtsuppname').value;
                var txtsuppaddress = document.getElementById('txtsuppaddress').value;
                var txtsupptin = document.getElementById('txtsupptin').value;

                $('#close').click();

                swal({
                    title: "Are you sure?",
                    //text: "This data will be saved and used for further transaction",
                    text: "Ipapasok ko na ito?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $('#close').click();

                        //alert(txtsuppname);
                        //alert(txtsuppaddress);
                        //alert(txtsupptin);

                        //var xmlhttp = new XMLHttpRequest();
                        //xmlhttp.open("GET", "Ajax/Insert_SUPPLIER.aspx?suppnameins=" + txtsuppname + "&suppaddressins=" + txtsuppaddress + "&supptinins=" + txtsupptin, false);
                        //xmlhttp.send(null);
                        var aiNew = oTable.fnAddData([txtsuppname, txtsuppaddress, txtsupptin, "<center><a class='btn btn-success edit' href='javascript:;'><i class='fa fa-edit'></i></a> </center>", '']);
                        var nRow = oTable.fnGetNodes(aiNew[0]);
                        document.getElementById("form_data").reset();
                        swal("Record Updated!", "The data is successfully Added!", "success");

                    } else swal("Cancelled", "The transaction is cancelled", "error");
                });


            });

            $('#editable-sample a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });
            $('#editable-sample a.retrieve').live('click', function (e) {
                e.preventDefault();
                var nRow = $(this).parents('tr')[0];
                var getval = $(this).closest('tr').children('td:first').text();
                name = $(this).closest('tr').children('td:first').text();
                desc = $(this).closest('tr').children('td:first').next().text();
                swal({

                    title: "Are you sure?",
                    text: "The record will be save and will be use for further transaction",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, do it!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                    function (isConfirm) {
                        if (isConfirm) {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.open("GET", "Backend/Retrieve_SupportingDocument.aspx?name=" + getval, false);
                            xmlhttp.send(null);
                            swal("Record Retrieved!", "The data is successfully Retrieved!", "success");
                            oTable.fnDeleteRow(nRow);
                            var aiNew = oTable.fnAddData([name, desc, "<center><span class='badge bg-success ' style='padding:10px;'>Active</span></center>", "<center><a class='btn btn-success  edit' href='javascript:;'><i class='fa fa-edit'></i></a> </center>", '']);

                        } else
                            swal("Cancelled", "The transaction is cancelled", "error");

                    });

            });

            $('#editable-sample a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
                else if (nEditing == nRow && this.innerText == "") {
                    /* Editing this row and want to save it */
                    var jqInputs = $('input', nRow);
                    if (jqInputs[1].value.length > 0) {

                        swal({
                            title: "Are you sure?",
                            text: "This data will be saved and used for further transaction",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes',
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }, function (isConfirm) {
                            if (isConfirm) {

                                //alert(befsuppname);
                                //alert(jqInputs[1].value);
                                //alert(befsuppaddress);
                                //alert(jqInputs[2].value);
                                //alert(befsupptin);
                                //alert(jqInputs[3].value);

                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.open("GET", "Ajax/Update_SUPPLIER.aspx?befsuppname=" + befsuppname + "&suppname=" + jqInputs[1].value + "&befsuppaddress=" + befsuppaddress + "&suppaddress=" + jqInputs[2].value + "&befsupptin=" + befsupptin + "&supptin=" + jqInputs[3].value, false);
                                xmlhttp.send(null);
                                swal("Record Updated!", "The data is successfully updated!", "success");
                                saveEdit(oTable, nEditing);
                                nEditing = null;

                            } else swal("Cancelled", "The transaction is cancelled", "error");
                        });

                    }
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();
