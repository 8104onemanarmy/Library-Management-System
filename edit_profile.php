<?php
	session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $db =mysqli_select_db($connection, 'lms_main');
    $email = ""; $name = ""; $mobile = "";
    $query = "SELECT * FROM `users` WHERE `email` = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while($row=mysqli_fetch_assoc($query_run))
    {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <title>User Dashboard</title>
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
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-center">
          <li class="nav-item">
            <a href="user_dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="issue_book.php" class="nav-link">Issue Books</a>
          </li>
        </ul>
      </div>
    </nav><br>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="update.php" method="post">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" value="<?php echo "$name"; ?>" name="name">
                </div>
                <div class="form-group">
                    <label>Email ID: </label>
                    <input type="text" class="form-control" value="<?php echo "$email"; ?>" name="email">
                </div>
                <div class="form-group">
                    <label>Mobile Number: </label>
                    <input type="text" class="form-control" value="<?php echo "$mobile"; ?>" name="mobile">
                </div>
                <button class="btn btn-primary" type="submit" name="update" value="update">Update</button>
            </form>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>