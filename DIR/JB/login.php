<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="../images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="../bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />

    <link rel="icon" href="../images/PUPLogo.png" sizes="32x32">

</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="#" method="POST"">

        <img class="form-images" src="../images/PUPLogo.png">        
        <h2 class="form-signin-heading">PUP QC<br>ASSET MANAGEMENT SYSTEM</h2>

        <?php

          if(isset($_POST["submit"]))
          {
            $username = $_POST['usernames'];
            $password = sha1($_POST['passwords']);

            $mysqli = new mysqli("localhost", "root", "", "AMS_SEMIFINAL_DB");

            if ($mysqli->connect_errno) 
            {
              echo "Failed to connect to Database: " . $mysqli->connect_error;
            }

            $res = $mysqli->query("SELECT * FROM AMS_R_USER AS U INNER JOIN AMS_R_EMPLOYEE_PROFILE AS EP ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME='$username' and U.U_PASSWORD='$password'");

            $row = $res->fetch_assoc();

            $fname = $row['EP_FNAME'];
            $mname = $row['EP_MNAME'];
            $lname = $row['EP_LNAME'];
            $myid = $row['EP_ID'];
            $myoffice = $row['O_ID'];

            $name = $fname.' '.$mname.' '.$lname;

            $user = $row['U_USERNAME'];
            $pass = $row['U_PASSWORD'];
            $type = $row['U_ROLE_CODE'];

            if($user == $username && $pass == $password)
            {
              session_start();
              if($type == "Property Officer")
              {
                $_SESSION['mysesi']=$name;
                $_SESSION['mytype']=$type;
                $_SESSION['myuser']=$user;
                $_SESSION['myid']=$myid;
                $_SESSION['myoid']=$myoffice;

                include('db.php');

                $inQuery = "INSERT INTO ams_r_users_log (UL_LOGGED_DATE, UL_LOGGED_TYPE, EP_ID) VALUES (CURRENT_TIMESTAMP, 'logged in', $myid)";

                mysqli_query($connection, $inQuery);

                echo "<script>window.location.assign('PropertyOfficer/PODashboard.php')</script>";
              }

              else if($type == "Administrator")
              {
                $_SESSION['mysesi']=$name;
                $_SESSION['mytype']=$type;
                $_SESSION['myuser']=$user;
                $_SESSION['myid']=$myid;
                $_SESSION['myoid']=$myoffice;

                include('db.php');

                $inQuery = "INSERT INTO ams_r_users_log (UL_LOGGED_DATE, UL_LOGGED_TYPE, EP_ID) VALUES (CURRENT_TIMESTAMP, 'logged in', $myid)";

                mysqli_query($connection, $inQuery);

                echo "<script>window.location.assign('Administrator/ADCampus.php')</script>";
              }

              else if($type == "Departmental User")
              {
                $_SESSION['mysesi']=$name;
                $_SESSION['mytype']=$type;
                $_SESSION['myuser']=$user;
                $_SESSION['myid']=$myid;
                $_SESSION['myoid']=$myoffice;

                include('db.php');

                $inQuery = "INSERT INTO ams_r_users_log (UL_LOGGED_DATE, UL_LOGGED_TYPE, EP_ID) VALUES (CURRENT_TIMESTAMP, 'logged in', $myid)";

                mysqli_query($connection, $inQuery);
                
                echo "<script>window.location.assign('DepartmentalUser/DUDashboard.php')</script>";
              } 
              else
              {
          ?>
            

          
          <?php
              }
            }
            else
            {
          ?>

              <p class="error-message-login">Incorrect Username and/or Password!</p>
              
          <?php
            }
          }
          ?>

        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" id="exampleInputEmail1" name="usernames" class="form-control" placeholder="Username" required />
              
                <input type="password" name="passwords" class="form-control" placeholder="Password" required />
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #8C1C1C" name="submit">Log in</button>

        </div>

          <!-- Modal -->
          <form>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" />

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Send</button>
                      </div>
                  </div>
              </div>
          </div>
          </form>
          
          <!-- modal -->

      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->

    <script src="../js/jquery.js"></script>
    <script src="../bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="../js/jquery.nicescroll.js"></script>
    <!--Easy Pie Chart-->
    <script src="../js/easypiechart/jquery.easypiechart.js"></script>
    <!--Sparkline Chart-->
    <script src="../js/sparkline/jquery.sparkline.js"></script>
    <!--jQuery Flot Chart-->
    <script src="../js/flot-chart/jquery.flot.js"></script>
    <script src="../js/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="../js/flot-chart/jquery.flot.resize.js"></script>
    <script src="../js/flot-chart/jquery.flot.pie.resize.js"></script>


    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>

    <!--common script init for all pages-->
    <script src="../js/scripts.js"></script>
    <!--this page script-->
    <script src="../js/validation-init.js"></script>

  </body>
</html>
