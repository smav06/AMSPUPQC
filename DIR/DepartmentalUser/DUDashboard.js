$('.classtbl a.releasemodal').click(function (e) {
    e.preventDefault();
    
    var id = $(this).closest('tr').children('td:first').text();
    var final = id.substring(1, 11);
    document.getElementById('qrcodehere').value = final;

    $.ajax({
        type: "GET",
        url: 'DUDashboard/AjaxGetData.php',
        dataType: 'json',
        data: {
            _final: final
        },
        success: function (data) {
            document.getElementById('modrelqrcode').value = data.qrcode;
            document.getElementById('modrelastdesc').value = data.descrip;
            document.getElementById('modrelempid').value = data.empid;
            document.getElementById('modrelastid').value = data.astid;
        },
        error: function (response) {
            swal("Please naman!", "Gumana kana!", "error");
        }

    });

});



$('#modrelsubmit').click(function (e) {
    e.preventDefault();

    var empid = document.getElementById('modrelempid').value;
    var astid = document.getElementById('modrelastid').value;
    var reason = document.getElementById('modrelreason').value;
    var today = moment().format('YYYY-MM-DD');

    //alert(today);

    $("#modrelclose").click();

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
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: 'POST',
                url: 'DUDashboard/AjaxReleaseAsset.php',
                data: {
                    _empid: empid,
                    _astid: astid,
                    _reason: reason,
                    _today: today
                },
                success: function (response) {
                    swal("Successfully Released!", "The asset is successfully released from this department.", "success");
                    $("#modrelclose").click();
                    document.getElementById("form-data2").reset();

                    setTimeout(function() 
                        {
                            window.location=window.location;
                        },1500);

                },
                error: function (response) {
                    swal("Error", "May mali bry eh!", "error");
                    $("#releasemodalupd").click();
                }
            });
        } 
        else 
        {
            swal("Cancelled", "Action is cancelled", "error");
            $("#releasemodalupd").click();
        }
    });

});



$('.classtbl a.damagedmodal').click(function (e) {
    e.preventDefault();
    
    var id = $(this).closest('tr').children('td:first').text();
    alert(id);

    $.ajax({
        type: "GET",
        url: 'DUDashboard/AjaxGetDataDamage.php',
        dataType: 'json',
        data: {
            _id: id
        },
        success: function (data) {
            document.getElementById('moddamastdesc').value = data.descrip;
            document.getElementById('moddamempid').value = data.empid;
            document.getElementById('moddamastid').value = data.astid;
        },
        error: function (response) {
            swal("Error", "May mali bry eh!", "error");
        }

    });

});



$('#moddamsubmit').click(function (e) {
    e.preventDefault();

    var empid = document.getElementById('moddamempid').value;
    var astid = document.getElementById('moddamastid').value;
    var report = document.getElementById('moddamreport').value;
    var today = moment().format('YYYY-MM-DD');

    //alert(today);

    $("#moddamclose").click();

    swal({
        title: "Are you sure you want to report this asset?",
        text: "Once you report this asset, it will moved to the list of reported damaged asset.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes',
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: 'POST',
                url: 'DUDashboard/AjaxReportDamaged.php',
                data: {
                    _empid: empid,
                    _astid: astid,
                    _report: report,
                    _today: today
                },
                success: function (response) {
                    swal("Report Successfully Sent!", "The report is sent to property officer.", "success");
                    $("#moddamclose").click();
                    document.getElementById("form-data3").reset();

                    setTimeout(function() 
                        {
                            window.location=window.location;
                        },1500);

                },
                error: function (response) {
                    swal("Error", "May mali bry eh!", "error");
                    $("#damagedmodalupd").click();
                }
            });
        } 
        else 
        {
            swal("Cancelled", "Action is cancelled", "error");
            $("#damagedmodalupd").click();
        }
    });

});