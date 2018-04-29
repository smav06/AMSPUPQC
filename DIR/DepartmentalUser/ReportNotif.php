<script type="text/javascript">

    $(document).ready(function(){
 
        function load_unseen_notification3(view3 = '') {

            var officeidofuser = document.getElementById('officeidofuser').value;

            $.ajax({
                url:"fetchbackreport.php",
                method:"POST",
                data:{view3:view3, officeidofuser: officeidofuser},
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