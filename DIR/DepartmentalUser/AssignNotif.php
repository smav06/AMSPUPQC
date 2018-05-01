<script type="text/javascript">

    $(document).ready(function(){
 
        function load_unseen_notification2(view2 = '') {

            var officeidofuser = document.getElementById('officeidofuser').value;

            $.ajax({
                url:"fetchAssign.php",
                method:"POST",
                data:{view2:view2, officeidofuser: officeidofuser},
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