$('.classtbl2 a.btncancels').click(function (e) {
    e.preventDefault();

    var id = $(this).closest('tr').children('td:first').text();
    // alert(id);

    swal({
        title: "Are you sure you want to cancel this report?",
        text: "The report will be cancelled if you click yes, otherwise no.",
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
                url: 'DUDashboard/AjaxCancelReport.php',
                data: {
                    _id: id
                },
                success: function (response) {
                    swal("Report Successfully Cancelled!", "The report you sent is now cancelled.", "success");
                    $("#moddamclose").click();

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