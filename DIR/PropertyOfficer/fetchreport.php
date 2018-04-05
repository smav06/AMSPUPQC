<?php
//fetch.php;
$connect = mysqli_connect("localhost", "root", "", "ams_semifinal_db");
if(isset($_POST["view2"]))
{
 // include("connect.php");
 if($_POST["view2"] != '')
 {
  $update_query = "UPDATE ams_t_report_of_damage SET ROD_VIEW_BY_PO = 1 WHERE ROD_VIEW_BY_PO = 0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT ROD.ROD_ID, ROD.ROD_NO, ROD.ROD_REASON, ROD.ROD_VIEW_CLICKED, ROD.ROD_STATUS, O.O_NAME, O.O_CODE, ROD.ROD_DATE, RODS.RODS_CANCEL_DATE FROM `ams_t_report_of_damage` AS ROD INNER JOIN `ams_t_report_of_damage_sub` AS RODS ON RODS.ROD_ID = ROD.ROD_ID INNER JOIN `ams_t_par_sub` AS PARS ON RODS.A_ID = PARS.A_ID INNER JOIN `ams_r_employee_profile` AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID WHERE ROD.ROD_STATUS = 'Pending' GROUP BY ROD.ROD_ID ORDER BY ROD.ROD_DATE DESC, ROD.ROD_ID DESC";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['ROD_ID'];
    $ifuserclicked =  $row['ROD_VIEW_CLICKED'];

    if ($ifuserclicked == 0) 
    {
      $output .= '<a href="POViewReportedDamage.php?passedrodid='.$id.'" onclick="myFunction2('.$id.')">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-success clearfix" style="background-color: #D9EDF7; color: gray;">
                        Date: <strong> '.$row["ROD_DATE"].' </strong><br/>
                        Request No: <strong> '.$row["ROD_NO"].' </strong><br/>
                        Request By: <strong> '.$row["O_CODE"].' </strong>
                      </div>
                    </li>
                </a>
                <li class="divider"></li>';
    }
    else
    {
      $output .= '<a href="POViewReportedDamage.php?passedrodid='.$id.'">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-warning clearfix" style="background-color: #F8F8F8; color: gray;">
                        Date: <strong> '.$row["ROD_DATE"].' </strong><br/>
                        Request No: <strong> '.$row["ROD_NO"].' </strong><br/>
                        Request By: <strong> '.$row["O_CODE"].' </strong>
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
                  <center>No Report Found</center>
                </div>
              </li>';
 }
 
 $query_1 = "SELECT * FROM ams_t_report_of_damage WHERE ROD_VIEW_BY_PO = 0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification2'   => $output,
  'unseen_notification2' => $count
 );
 echo json_encode($data);
}
?>