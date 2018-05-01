<?php
//fetch.php;
$connect = mysqli_connect("localhost", "root", "", "ams_semifinal_db");
if(isset($_POST["view3"]))
{
 // include("connect.php");
 if($_POST["view3"] != '')
 {
  $update_query = "UPDATE ams_t_user_request_summary AS URS SET URS.URS_VIEW_BY_PO_URGENT = 1 WHERE URS.URS_VIEW_BY_PO_URGENT = 0 AND URS.URS_URGENT_DATE <= DATE_ADD(CURRENT_DATE, INTERVAL 5 DAY) AND URS.URS_URGENT_DATE != CURRENT_DATE";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT *, datediff(URS_URGENT_DATE,CURRENT_DATE) as remainingdays FROM ams_t_user_request_summary AS URS INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID WHERE URS.URS_URGENT_DATE <= DATE_ADD(CURRENT_DATE, INTERVAL 5 DAY) AND URS.URS_URGENT_DATE != CURRENT_DATE GROUP BY URS.URS_ID ORDER BY URS.URS_REQUEST_DATE DESC, URS.URS_ID DESC";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['URS_ID'];
    $ifuserclicked =  $row['URS_VIEW_CLICKED_URGENT'];

    $curredate = Date('Y-m-d');

    if ($ifuserclicked == 0) 
    {
      $output .= '<a href="POViewRequestFromDU.php?viewrequests='.$id.'" onclick="myFunction3('.$id.')">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-success clearfix" style="background-color: #FFCDD2; color: gray;">
                        You have an unevaluated/unopened request. </br>
                        Request No: <strong> '.$row["URS_NO"].' </strong> <br/>
                        Request By: <strong> '.$row["O_CODE"].' </strong><br/>
                        This request will expired within: <strong> '.$row['remainingdays'].' days </strong> <br/>
                        <strong style="font-size: 11px;"><u>Click for see details.</u></strong>
                      </div>
                    </li>
                </a>
                <li class="divider"></li>';
    }
    else
    {
      $output .= '<a href="POViewRequestFromDU.php?viewrequests='.$id.'">
                    <li style="margin-top: 10px;">
                      <div class="alert alert-warning clearfix" style="background-color: #F8F8F8; color: gray;">
                        You have an unevaluated/unopened request. </br>
                        Request No: <strong> '.$row["URS_NO"].' </strong> <br/>
                        Request By: <strong> '.$row["O_CODE"].' </strong><br/>
                        This request will expired within: <strong> '.$row['remainingdays'].' days </strong> <br/>
                        <strong style="font-size: 11px;"><u>Click for see details.</u></strong>
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
                  <center>No Unread Request Found</center>
                </div>
              </li>';
 }
 
 $query_1 = "SELECT * FROM ams_t_user_request_summary AS URS WHERE URS.URS_VIEW_BY_PO_URGENT = 0 AND URS.URS_URGENT_DATE <= DATE_ADD(CURRENT_DATE, INTERVAL 5 DAY) AND URS.URS_URGENT_DATE != CURRENT_DATE GROUP BY URS.URS_ID ORDER BY URS.URS_REQUEST_DATE DESC, URS.URS_ID DESC";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification3'   => $output,
  'unseen_notification3' => $count
 );
 echo json_encode($data);
}
?>