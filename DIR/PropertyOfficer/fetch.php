<?php
//fetch.php;
$connect = mysqli_connect("localhost", "root", "", "ams_semifinal_db");
if(isset($_POST["view"]))
{
 // include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE ams_t_user_request_summary SET URS_VIEW_BY_PO = 1 WHERE URS_VIEW_BY_PO = 0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT *, datediff(URS_URGENT_DATE,CURRENT_DATE) as remainingdays  FROM `ams_t_user_request_summary` AS URS INNER JOIN `ams_t_user_request` AS UR ON UR.URS_ID = URS.URS_ID INNER JOIN `ams_r_employee_profile` AS EP ON UR.EP_ID = EP.EP_ID INNER JOIN `ams_r_office` AS O ON EP.O_ID = O.O_ID WHERE URS.URS_STATUS_TO_PO = 'Pending' GROUP BY URS.URS_ID ORDER BY URS.URS_REQUEST_DATE DESC, URS.URS_ID DESC";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['URS_ID'];
    $ifuserclicked =  $row['URS_VIEW_CLICKED'];
    $ursurgentdate = $row['URS_URGENT_DATE'];

    $Date1 = $ursurgentdate;
    $date = new DateTime($Date1);
    $date -> modify('-5 day');
    $ursurgentdateminusfivedays = $date->format('Y-m-d');

    $curredate = Date('Y-m-d');

    if ($ursurgentdateminusfivedays > $curredate) 
    {
      if ($ifuserclicked == 0) 
      {
        $output .= '<a href="POViewRequestFromDU.php?viewrequests='.$id.'" onclick="myFunction('.$id.')">
                      <li style="margin-top: 10px;">
                        <div class="alert alert-success clearfix" style="background-color: #D9EDF7; color: gray;">
                          Date: <strong> '.$row["URS_REQUEST_DATE"].' </strong><br/>
                          Request No: <strong> '.$row["URS_NO"].' </strong><br/>
                          Request By: <strong> '.$row["O_CODE"].' </strong><br/>
                          Request will expired within: <strong> '.$row['remainingdays'].' days </strong>
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
                          Date: <strong> '.$row["URS_REQUEST_DATE"].' </strong><br/>
                          Request No: <strong> '.$row["URS_NO"].' </strong><br/>
                          Request By: <strong> '.$row["O_CODE"].' </strong><br/>
                          Request will expired within: <strong> '.$row['remainingdays'].' days </strong>
                        </div>
                      </li>
                  </a>
                  <li class="divider"></li>';
      }
    }
    else
    {
      
    }

  }
 }
 else
 {
  $output .= '<li style="margin-top: 10px;">
                <div class="alert alert-warning clearfix">
                  <center>No Request Found</center>
                </div>
              </li>';
 }
 
 $query_1 = "SELECT * FROM ams_t_user_request_summary WHERE URS_VIEW_BY_PO = 0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>