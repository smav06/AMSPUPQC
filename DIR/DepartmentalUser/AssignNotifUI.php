<li id="header_notification_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle dt2" href="#">
        <i class="fa fa-tag"></i>
        <span class="badge bg-warning count2"></span>
    </a>
        
    <?php 

        $aydiopyuser = $_SESSION['myoid'];
        // echo $aydiopyuser;

        $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXXz FROM ams_t_par AS PAR INNER JOIN ams_t_par_sub AS PARS ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE O.O_ID = $aydiopyuser GROUP BY PAR.PAR_ID");

        while($rowx = mysqli_fetch_assoc($sqlcntx))
        {
            $cntx = $rowx['XXXz'];
            echo '<input type="hidden" id="cntofrequests" value="'.$cntx.'" />';
        }

        echo '<ul class="dropdown-menu extended notification dispnotif2" style="overflow-y: scroll; height: 390px;">
        </ul>';

    ?>
    
</li>