<?php
	session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main');
    $isbn = ""; $book_name = ""; $user_id = ""; $user_name = ""; $issue_date = ""; $due_date = "";
    $current_date = date('Y-m-d');
        $query = "select books.isbn as isbn, books.book_name as book_name, issued_books.issue_date as issue_date, issued_books.due_date as due_date
                from issued_books left join books on issued_books.isbn = books.isbn where issued_books.user_id = $_SESSION[id]";

          $query_run = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <title>Issued Books</title>
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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="900px" style="text-align: center;">
                    <tr>
                        <th>ISBN</th>
                        <th>Book</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $current_date = date('Y-m-d');
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            $isbn = $row['isbn'];
                            $book_name = $row['book_name'];
                            $issue_date = $row['issue_date'];
                            $due_date = $row['due_date'];
                        
                            // Determine return status based on due date
                            $return_status = ($current_date > $due_date) ? "Not Returned" : "Returned";
                    
                            // Output the data
                            echo "<tr>
                                <td>$isbn</td>
                                <td>$book_name</td>
                                <td>$issue_date</td>
                                <td>$due_date</td>
                                <td>$return_status</td>
                                </tr>";
                        }
                    ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>