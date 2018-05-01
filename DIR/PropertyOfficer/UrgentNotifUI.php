<li id="header_notification_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle dt3" href="#">
        <i class="fa fa-exclamation-circle"></i>
        <span class="badge bg-warning count3"></span>
    </a>

       
    <?php 

        $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXXZZ FROM ams_t_user_request_summary WHERE URS_URGENT_DATE <= DATE_ADD(CURRENT_DATE, INTERVAL 5 DAY) AND URS_URGENT_DATE != CURRENT_DATE");

        while($rowx = mysqli_fetch_assoc($sqlcntx))
        {
            $cnt = $rowx['XXXZZ'];
            echo '<input type="text" class="hidden" id="cntofreqs" value="'.$cnt.'" />';
        }

        echo '<ul class="dropdown-menu extended21 notification dispnotif3" style="overflow-y: scroll; height: 475px;">
    </ul>';
    ?>
</li>