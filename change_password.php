<?php
	session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $db =mysqli_select_db($connection, 'lms_main');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <title>Change Password</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="user_dashboard.php">Library Management System</a>
			</div>
        <font style="color : white"><span><strong><?php echo "WELCOME: ".$_SESSION['name']; ?></strong></span></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown toggle" data-toggle = "dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a href="view_profile.php" class="dropdown-item">View Profile</a>
                        <a href="edit_profile.php" class="dropdown-item">Edit Profile</a>
                        <a href="change_password.php" class="dropdown-item">Change Password</a>
                    </div>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">Logout</a>
              </li>
		    </ul>
		</div>
    </nav><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="update_password.php" method="post">
                <div class="form-group">
                    <label>Enter Current Password: </label>
                    <input type="password" class="form-control" name="curr_passwd">
                </div>
                <div class="form-group">
                    <label>Enter New Password: </label>
                    <input type="password" class="form-control" name="new_passwd">
                </div>
                <div class="form-group">
                    <label>Confirm New Password: </label>
                    <input type="password" class="form-control" name="confirm_passwd">
                </div>
                <center><button type="submit" class="btn btn-primary">Change Password</button></center>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php
    // Display error message if set. (Incorrect credentials)
    if (isset($_SESSION['passwd_error'])) {
        echo "<p><center><b>{$_SESSION['passwd_error']}</b></center></p>";
        unset($_SESSION['passwd_error']); // Clear the session variable after displaying the message
    }    
    ?>
</body>
</html>