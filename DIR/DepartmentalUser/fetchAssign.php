<?php
//fetch.php;

$officeidofuser = $_POST['officeidofuser'];

$connect = mysqli_connect("localhost", "root", "", "ams_semifinal_db");
if(isset($_POST["view2"]))
{
 // include("connect.php");
 if($_POST["view2"] != '')
 {
  $update_query = "UPDATE ams_t_par AS PAR INNER JOIN ams_t_par_sub AS PARS ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID SET PAR.PAR_DU_VIEW = 1 WHERE PAR.PAR_DU_VIEW = 0 AND O.O_ID = $officeidofuser";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT *, COUNT(*) AS NOOFITEMPERBATCH FROM ams_t_par AS PAR INNER JOIN ams_t_par_sub AS PARS ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE O.O_ID = $officeidofuser GROUP BY PAR.PAR_ID ORDER BY PAR.PAR_ID DESC";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['PAR_ID'];
    $ifuserclicked =  $row['PAR_DU_CLICKED'];
    $pardate =  $row['PAR_DATE'];
    $epwholename =  $row['EP_FNAME'].' '.$row['EP_MNAME'].' '.$row['EP_LNAME'];
    $cntofassetperparid =  $row['NOOFITEMPERBATCH'];

    if ($ifuserclicked == 0) 
    {
      $output .= '<a href="DUAssignedAssetView.php?receiveparid='.$id.'" onclick="myFunction2('.$id.')">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-success clearfix" style="background-color: #D9EDF7; color: gray;">
                        Date: <strong> '.$pardate.' </strong> </br>
                        Notif: <strong> '.$cntofassetperparid.' item/asset has been assigned to your department.</strong> </br>
                        <strong style="font-size: 11px;"><u>Click for more details.</u></strong>
                      </div>
                    </li>
                </a>
                <li class="divider"></li>';
    }
    else
    {
      $output .= '<a href="DUAssignedAssetView.php?receiveparid='.$id.'">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-warning clearfix" style="background-color: #F8F8F8; color: gray;">
                        Date: <strong> '.$pardate.' </strong> </br>
                        Notif: <strong> '.$cntofassetperparid.' item/asset has been assigned to your department.</strong> </br>
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
                  <center>No Assigned Notification Found </center>
                </div>
              </li>';
 }
 
 $query_1 = "SELECT * FROM ams_t_par AS PAR INNER JOIN ams_t_par_sub AS PARS ON PARS.PAR_ID = PAR.PAR_ID INNER JOIN ams_r_employee_profile AS EP ON PARS.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE PAR.PAR_DU_VIEW = 0 AND O.O_ID = $officeidofuser GROUP BY PAR.PAR_ID";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification2'   => $output,
  'unseen_notification2' => $count
 );
 echo json_encode($data);
}
?>