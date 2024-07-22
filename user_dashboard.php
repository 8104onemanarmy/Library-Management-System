<?php
	session_start();
  function get_user_issued_book_count(){
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $book_count = 0;
    $query = "select count(*) as book_count from issued_books where user_id = $_SESSION[id];";
    $query_run = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($query_run)){
      $book_count = $row['book_count'];
    }
    return $book_count;
  }

  function get_total_book_count(){
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $book_count = 0;
    $query = "select count(*) as book_count from books;";
    $query_run = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($query_run)){
      $book_count = $row['book_count'];
    }
    return $book_count;
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
    <div class="" style="display: flex;">
          <div class="card bg-light" style="width : 300px; margin-left:30px">
            <div class="card-header">Issued Books</div>
            <div class="card-body">
              <p class="card-text">No. of issued books: <?php  echo get_user_issued_book_count();?></p>
              <a href="view_issued_books.php" class="btn btn-primary" target="_blank">View Issued Books</a>
            </div>
          </div>
          <div class="card bg-light" style="width : 300px; margin-left:30px">
            <div class="card-header">All available books</div>
            <div class="card-body">
              <p class="card-text">No. of available books: <?php  echo get_total_book_count();?></p>
              <a href="view_available_books.php" class="btn btn-secondary" target="_blank">View Available Books</a>
            </div>
          </div>
    </div>
    </div>
</body>
</html>