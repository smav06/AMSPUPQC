<li id="header_notification_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle dt3" href="#">
        <i class="fa fa-warning"></i>
        <span class="badge bg-warning count3"></span>
    </a>
        
    <?php 

        $aydiopyuser = $_SESSION['myoid'];
        // echo $aydiopyuser;

        $sqlcntx = mysqli_query($connection, "SELECT COUNT(*) AS XXXz FROM ams_t_report_of_damage AS ROD INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.ROD_ID = ROD.ROD_ID INNER JOIN ams_t_par_sub AS PARS ON PARS.A_ID = RODS.A_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE ROD.ROD_STATUS != 'Pending' AND O.O_ID = $aydiopyuser GROUP BY ROD.ROD_ID");

        while($rowx = mysqli_fetch_assoc($sqlcntx))
        {
            $cntx = $rowx['XXXz'];
            echo '<input type="hidden" id="cntofrequests" value="'.$cntx.'" />';
        }

        echo '<ul class="dropdown-menu extended notification dispnotif3" style="overflow-y: scroll; height: 390px;">
        </ul>';

    ?>
    
</li>