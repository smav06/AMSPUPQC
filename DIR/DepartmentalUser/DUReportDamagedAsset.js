$('.classtbl2 a.btncancels').click(function (e) {
    e.preventDefault();

    var idss = $(this).closest('tr').children('td:first').text();
    // alert(idss);

    swal({
        title: "Are you sure you want to cancel this report?",
        text: "The report will be cancelled if you click yes.",
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
                    _id: idss
                },
                success: function (response) {
                    swal("Report Successfully Cancelled!", "The report you sent is now cancelled.", "success");

                    setTimeout(function() 
                    {
                        window.location=window.location;
                    },2000);

                },
                error: function (response) {
                    swal("Error", "May mali bry eh!", "error");
                }
            });
        } 
        else 
        {
            swal("Cancelled", "Action is cancelled", "error");
        }
    });

});