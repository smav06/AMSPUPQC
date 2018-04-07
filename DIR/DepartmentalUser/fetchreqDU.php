<?php
//fetch.php;

$officeidofuser = $_POST['officeidofuser'];

$connect = mysqli_connect("localhost", "root", "", "ams_semifinal_db");
if(isset($_POST["view"]))
{
 // include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE ams_t_user_request_summary AS URS INNER JOIN ams_t_user_request AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN ams_r_employee_profile AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID SET URS.URS_VIEW_BY_USER = 1 WHERE URS.URS_VIEW_BY_USER = 0 AND O.O_ID = $officeidofuser AND URS.URS_STATUS_TO_PO != 'Pending'";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM ams_t_user_request_summary AS URS INNER JOIN ams_t_user_request AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN ams_r_employee_profile AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE URS.URS_STATUS_TO_PO != 'Pending' AND O.O_ID = $officeidofuser GROUP BY URS.URS_ID ORDER BY URS.URS_ID DESC";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['URS_ID'];
    $ifuserclicked =  $row['URS_VIEW_CLICKED'];
    $ursstatus = $row['URS_STATUS_TO_PO'];

    if ($ursstatus == 'Approved') 
    {
      $output .= '<a>
                    <li style="margin-top: 10px;">
                      <div class="alert alert-success clearfix" style="background-color: #DFF0D8; color: gray;">
                        Request No: <strong> '.$row["URS_NO"].' </strong><br/>
                        Status: <strong> '.$row["URS_STATUS_TO_PO"].' </strong><br/>
                        Approved Date: <strong> '.$row["URS_APPROVED_DATE"].' </strong><br/>
                        Remarks: <strong> '.$row["URS_REMARKS"].' </strong>
                      </div>
                    </li>
                  </a>
                  <li class="divider"></li>';
    }
    else if ($ursstatus == 'Reject') 
    {
      $output .= '<a>
                    <li style="margin-top: 10px;">
                      <div class="alert alert-warning clearfix" style="background-color: #F2DEDE; color: gray;">
                        Request No: <strong> '.$row["URS_NO"].' </strong><br/>
                        Status: <strong> '.$row["URS_STATUS_TO_PO"].' </strong><br/>
                        Reject Date: <strong> '.$row["URS_REJECT_DATE"].' </strong><br/>
                        Remarks: <strong> '.$row["URS_REMARKS"].' </strong>
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
                  <center>No Notification Found </center>
                </div>
              </li>';
 }
 
 $query_1 = "SELECT * FROM ams_t_user_request_summary URS INNER JOIN ams_t_user_request AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN ams_r_employee_profile AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN ams_r_office AS O ON EP.O_ID = O.O_ID WHERE URS.URS_VIEW_BY_USER = 0 AND O.O_ID = $officeidofuser AND URS.URS_STATUS_TO_PO != 'Pending' GROUP BY URS.URS_ID";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>