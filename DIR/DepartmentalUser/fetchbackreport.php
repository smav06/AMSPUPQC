<?php
//fetch.php;

$officeidofuser = $_POST['officeidofuser'];

$connect = mysqli_connect("localhost", "root", "", "ams_semifinal_db");
if(isset($_POST["view3"]))
{
 // include("connect.php");
 if($_POST["view3"] != '')
 {
  $update_query = "UPDATE ams_t_report_of_damage AS ROD INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.ROD_ID = ROD.ROD_ID INNER JOIN ams_t_par_sub AS PARS ON PARS.A_ID = RODS.A_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID SET ROD.ROD_VIEW_BY_USER = 1 WHERE ROD.ROD_VIEW_BY_USER = 0 AND ROD.ROD_STATUS != 'Pending' AND O.O_ID = $officeidofuser";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM ams_t_report_of_damage AS ROD INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.ROD_ID = ROD.ROD_ID INNER JOIN ams_t_par_sub AS PARS ON PARS.A_ID = RODS.A_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE ROD.ROD_STATUS != 'Pending' AND O.O_ID = $officeidofuser GROUP BY ROD.ROD_ID ORDER BY RODS.RODS_DATE_INSPECT DESC, ROD.ROD_NO";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['ROD_ID'];
    $ifuserclicked =  $row['ROD_VIEW_BY_USER_EVAL'];

    if ($ifuserclicked == 0) 
    {
      $output .= '<a href="">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-success clearfix" style="background-color: #D9EDF7; color: gray;">
                        Report No: <strong> '.$row["ROD_NO"].' </strong> </br>
                        Date Reported: <strong> '.$row["ROD_DATE"].' </strong> </br>                        
                        Date Evaluated: <strong> '.$row["RODS_DATE_INSPECT"].' </strong> </br>
                        <strong style="font-size: 11px;"><u>Click for more details.</u></strong>
                      </div>
                    </li>
                </a>
                <li class="divider"></li>';
    }
    else
    {
      $output .= '<a href="">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-warning clearfix" style="background-color: #F8F8F8; color: gray;">
                        Report No: <strong> '.$row["ROD_NO"].' </strong> </br>
                        Date Reported: <strong> '.$row["ROD_DATE"].' </strong> </br>                        
                        Date Evaluated: <strong> '.$row["RODS_DATE_INSPECT"].' </strong> </br>
                        <strong style="font-size: 11px;"><u>Click for more details.</u></strong>
                      </div>
                    </li>
                </a>
                <li class="divider"></li>';
    }

  }
 }
 else
 {
  $output .= '<li style="margin-top: 10px;">
                <div class="alert alert-warning clearfix">
                  <center>No Evaluated Report Found</center>
                </div>
              </li>';
 }
 
 $query_1 = "SELECT * FROM ams_t_report_of_damage AS ROD INNER JOIN ams_t_report_of_damage_sub AS RODS ON RODS.ROD_ID = ROD.ROD_ID INNER JOIN ams_t_par_sub AS PARS ON PARS.A_ID = RODS.A_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE ROD.ROD_VIEW_BY_USER = 0 AND ROD.ROD_STATUS != 'Pending' AND O.O_ID = $officeidofuser GROUP BY ROD.ROD_ID";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification3'   => $output,
  'unseen_notification3' => $count
 );
 echo json_encode($data);
}
?>