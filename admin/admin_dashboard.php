<?php
  require('functions.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System</a>
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
            <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Books</a>
            <div class="dropdown-menu">
              <a href="add_book.php" class="dropdown-item">Add New Book</a>
              <a href="manage_book.php" class="dropdown-item">Manage Books</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
            <div class="dropdown-menu">
              <a href="add_category.php" class="dropdown-item">Add New Category</a>
              <!-- <a href="" class="dropdown-item">Manage Categories</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a>
            <div class="dropdown-menu">
              <a href="add_author.php" class="dropdown-item">Add New Authors</a>
              <!-- <a href="" class="dropdown-item">Manage Authors</a> -->
            </div>
          </li>
          <!-- <li class="nav-item">
            <a href="issue_book.php" class="nav-link">Issue Books</a>
          </li> -->
        </ul>
      </div>
    </nav><br>

    <div class="row">
        <div class="col-md-3">
          <div class="card bg-light" style="width : 300px; margin-left:30px">
            <div class="card-header">Registered Users</div>
            <div class="card-body">
              <p class="card-text">No. of total users: <?php echo "".get_user_count(); ?></p>
              <a href="reg_users.php" class="btn btn-primary" target="_blank">View Registered Users</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-light" style="width : 300px; margin-left:30px">
            <div class="card-header">Registered Books</div>
            <div class="card-body">
              <p class="card-text">No. of available books: <?php echo "".get_book_count(); ?></p>
              <a href="reg_books.php" class="btn btn-danger" target="_blank">View Registered Books</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-light" style="width : 300px; margin-left:30px">
            <div class="card-header">Registered Categories</div>
            <div class="card-body">
              <p class="card-text">No. of total categories: <?php echo "".get_category_count(); ?></p>
              <a href="reg_categories.php" class="btn btn-primary" target="_blank">View Categories</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-light" style="width : 300px; margin-left:30px">
            <div class="card-header">Registered Authors</div>
            <div class="card-body">
              <p class="card-text">No. of authors: <?php echo "".get_author_count(); ?></p>
              <a href="reg_authors.php" class="btn btn-danger" target="_blank">View Registered Authors</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-light" style="width : 300px; margin-left:30px; margin-top: 50px;">
            <div class="card-header">Issued Books</div>
            <div class="card-body">
              <p class="card-text">No. of issued books: <?php echo "".get_issue_count(); ?></p>
              <a href="reg_issued.php" class="btn btn-success" target="_blank">View Issued Books</a>
            </div>
          </div>
        </div>
    </div>
</body>
</html>