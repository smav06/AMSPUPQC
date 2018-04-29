<?php 

   include('../Connection/db.php');

                                $sql = "SELECT * FROM ams_r_employee_profile AS EP JOIN ams_r_user AS U ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME = '".$_SESSION['myuser']."'";
                                 $sql1 = "SELECT O.O_NAME AS OFFICE FROM ams_r_employee_profile AS EP JOIN ams_r_user AS U ON U.EP_ID = EP.EP_ID INNER JOIN AMS_R_OFFICE AS O ON EP.O_ID = O.O_ID WHERE U.U_USERNAME = '".$_SESSION['myuser']."'";

                               

?>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalProfile" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8C1C1C; color: white">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Profile</h4>
                </div>

                <div class="modal-body">

                    <form role="form" method="POST" id="form-data3">
                        <div class="form-group">
                            <div class="adv-table">
                             
                                    	<?php
                                    	 $result = mysqli_query($connection, $sql);

			                                while ($row = mysqli_fetch_array($result)) 
			                                {
			                                  $pic = $row['EP_PICTURE'];
			                                  echo '<img alt="" src="../../'.$pic.'" alt="" style ="border-radius: 50%; height: 150px; width: 150px; margin-left: 20px;" >';
			                                }


			                             ?>
			                             <br>
			                             <br>                            
                            </div>


                    </form>

                     <div style="margin-left: 200px; margin-top: -140px; line-height: 0.8;">
                     <div class="row">
                        <div class="col-md-12">
                        	<?php
                                    	 $result = mysqli_query($connection, $sql);

			                                while ($row = mysqli_fetch_array($result)) 
			                                {
			                                  $name = $row['EP_FNAME'].' '. $row['EP_MNAME'].' '. $row['EP_LNAME'];
			                                  echo '<p style="font-size: 18px;"><strong>Name:</strong> '.$name. '</p><br>';
			                                }


			                             ?>
                            
                        </div>
                         <div class="col-md-12">
                          	<?php
                                    	 $result = mysqli_query($connection, $sql);

			                                while ($row = mysqli_fetch_array($result)) 
			                                {
			                                  $type = $row['EP_TYPE'];
			                                  echo '<p style="font-size: 18px;"><strong>Position: </strong>'.$type. '</p><br>';
			                                }


			                             ?>
                        </div>
                         <div class="col-md-12">
                            	<?php
                                    	 $result = mysqli_query($connection, $sql1);

			                                while ($row = mysqli_fetch_array($result)) 
			                                {
			                                  $office = $row['OFFICE'];
			                                  echo '<p style="font-size: 18px;"><strong>Department:</strong> '.$office. '</p><br>';
			                                }


			                             ?>
                        </div>
                      
                    </div>
                         	
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                    </div>

                   
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><h4>Personal Information</h4></label><br>
                                <label>Gender:</label>
                             

                                <?php  

                                    $result = mysqli_query($connection, $sql);

			                                while ($row = mysqli_fetch_array($result)) 
			                                {
			                                  $gender = $row['EP_GENDER']; ?>
			                                  <input type="text" id="F_lname" style="color: black;" class="form-control" value="<?php echo $gender; ?>" disabled><br> <?php
			                                }

                                ?>
                                
                                <label>Mobile Phone:</label>
                                  <?php  

                                    $result = mysqli_query($connection, $sql);

			                                while ($row = mysqli_fetch_array($result)) 
			                                {
			                                  $phone = $row['EP_MOBILE']; ?>
			                                  <input type="text" id="F_lname" style="color: black;" class="form-control" value="<?php echo $phone; ?>" disabled><br> <?php
			                                }

                                ?>
                                
                                <label>Email Address:</label>

                                  <?php  

                                    $result = mysqli_query($connection, $sql);

			                                while ($row = mysqli_fetch_array($result)) 
			                                {
			                                  $email = $row['EP_EMAIL']; ?>
			                                  <input type="text" id="F_lname" style="color: black;" class="form-control" value="<?php echo $email; ?>" disabled><br> <?php
			                                }

                                ?>
                                



                             
                                
                               
                            </div>

                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding: 0.5px; margin-bottom: 10px; background-color: #757575;">
                            </div>
                        </div>
                    </div>

                   <!-- <button class="btn btn-success" id="btnsend" type="button">Ok</button>-->
                    <button data-dismiss="modal" class="btn btn-default" id="ggss" type="button">Close</button>

                </div>

            </div>
        </div>
    </div>