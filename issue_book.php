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
    <title>Issue Books</title>
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
            <form action="" method="post">
                <div class="form-group">
                    <label for="author_name">Select Book to Issue: </label>
                   <select name="book_name" id="" class="form-control">
                        <option>-Select Book-</option>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
                            $db =mysqli_select_db($connection, 'lms_main');
                            $email = $_POST['email'];
                            $query = "SELECT `book_name` FROM `books`;";
                            $query_run = mysqli_query($connection, $query);
                            while($row=mysqli_fetch_assoc($query_run))
                            {
                                ?>
                                <option><?php echo $row['book_name']; ?></option>
                                <?php
                            }
                        ?>
                   </select>
                </div>
                <div class="form-group">
                    <label for="issue_date">Issue Date: </label>
                    <input type="text" class="form-control" name="issue_date" value="<?php echo date('y-m-d')?>" required>
                </div>
                <center><button class="btn btn-primary" type="submit" name="issue_book">Issue Book</button></center>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div> 
</body>
</html>
<?php
  if(isset($_POST['issue_book']))
  {
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main');
    $book_name = $_POST['book_name'];
    $issue_date = $_POST['issue_date'];
    $due_date_timestamp = strtotime($issue_date . ' +15 days');
    $due_date = date('y-m-d', $due_date_timestamp);
    $user_id = $_SESSION['id'];
    $isbn = 0;
    $query1 = "select isbn from books where book_name = '$book_name';";
    $query_run1 = mysqli_query($connection, $query1);
    while($row = mysqli_fetch_assoc($query_run1)){
      $isbn = $row['isbn'];
      // $query2 = "insert into issued_books values (null, '$isbn', '$user_id', '$issue_date', '$due_date');";
      $query2 = "insert into issued_books select null, '$isbn', '$user_id', '$issue_date', '$due_date'
                where not exists(
                  select 1 from issued_books where isbn = '$isbn'
                  )";
      mysqli_query($connection, $query2);
    }
    echo "<script>alert('Book Issued Successfully!'); window.location.href = user_dashboard.php ;</script>";
  }
?>