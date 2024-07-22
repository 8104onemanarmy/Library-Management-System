<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System</a>
			</div>
	
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item">
		        <a class="nav-link" href="admin/index.php">Admin Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="signup.php"></span>Register</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Login</a>
		      </li>
		    </ul>
		</div>
    </nav><br>
    <div class="row">
		<div class="col-md-4" id="side_bar">
			<h5>Library Timings</h5>
			<ul>
				<li>Opening: 9:00 AM</li>
				<li>Closing: 1:00 AM</li>
				<li>Sunday - 9:00 AM to 17:30 PM</li>
			</ul>
			<h5>Features</h5>
			<ul>
				<li>AC Rooms</li>
				<li>Free Wi-fi</li>
				<li>News Papers and Journals</li>
				<li>Discussion Rooms</li>
				<li>RO Water Facility</li>
				<li>Serene Environment</li>
			</ul>
		</div>
		<div class="col-md-6" id="main_content">
			<center><h3><u>User Login</u></h3></center>
			<form action="login.php" method="post">
                <!-- Email -->
				<div class="form-group">
					<label for="email">Email ID:</label>
					<input type="email" name="email" class="form-control" required>
				</div>
                <!-- Password -->
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" name="login" class="btn btn-primary">Login</button> |
				<a href="signup.php"> Not registered yet ?</a>	
			</form>
		</div>
	</div>
	<?php
    // Display error message if set. (Incorrect credentials)
    if (isset($_SESSION['login_error'])) {
        echo "<p><center><b>{$_SESSION['login_error']}</b></center></p>";
        unset($_SESSION['login_error']); // Clear the session variable after displaying the message
    }
    ?>
</body>
</html>