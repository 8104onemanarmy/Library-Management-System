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
    <title>Add Books</title>
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
            <a href="admin_dashboard.php" class="nav-link">Issue Books</a>
          </li> -->
        </ul>
      </div>
    </nav><br>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="book_name">Name of Book: </label>
                    <input type="text" class="form-control" name="book_name" required>
                </div>
                <div class="form-group">
                    <label for="author_name">Name of Author: </label>
                    <input type="text" class="form-control" name="author_name" required>
                </div>
                <div class="form-group">
                    <label for="category">Category: </label>
                    <input type="text" class="form-control" name="category" required>
                </div>
                <div class="form-group">
                    <label for="price">Price: </label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                    <label for="copies">Number of Copies: </label>
                    <input type="text" class="form-control" name="copies" required>
                </div>
                <center><button class="btn btn-primary" type="submit" name="add_book">Add Book</button></center>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    
</body>
</html>
<?php
if (isset($_POST['add_book'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $db = mysqli_select_db($connection, 'lms_main');
    
    // Insert author only if it doesn't exist
    // $query1 = "INSERT IGNORE INTO authors (author_name) VALUES ('$_POST[author_name]');";   
    $query1 = "INSERT INTO authors (author_id, author_name)
    SELECT null, '$_POST[author_name]'
    WHERE NOT EXISTS (
        SELECT 1 FROM authors WHERE author_name = '$_POST[author_name]'
    );" ;
    // Insert category only if it doesn't exist
    // $query2 = "INSERT IGNORE INTO category (category_name) VALUES ('$_POST[category]');";
    $query2 = "INSERT INTO category (category_id, category_name)
    SELECT null, '$_POST[category]'
    WHERE NOT EXISTS (
        SELECT 1 FROM category WHERE category_name = '$_POST[category]'
    );" ;

    // $query3 = "INSERT INTO books (isbn, book_name, book_copies, book_price) VALUES (null, '$_POST[book_name]', '$_POST[copies]', '$_POST[price]')";
    // $query3 = "INSERT INTO books  VALUES (null, '$_POST[book_name]', (SELECT author_id FROM authors WHERE author_name = '$_POST[author_name]'), (SELECT category_id FROM category WHERE category_name = '$_POST[category]'), '$_POST[copies]', '$_POST[price]')";
    // $query3 = "INSERT INTO books (isbn, book_name, author_id, category_id, book_copies, book_price)
    //        SELECT null, '$_POST[book_name]', a.author_id, c.category_id, '$_POST[copies]', '$_POST[price]'
    //        FROM authors a, category c
    //        WHERE a.author_name = '$_POST[author_name]'
    //          AND c.category_name = '$_POST[category]'
    //        LIMIT 1;";

          $query3 = "INSERT INTO books (isbn, book_name, author_id, category_id, book_copies, book_price)
           SELECT null, '$_POST[book_name]', a.author_id, c.category_id, '$_POST[copies]', '$_POST[price]'
           FROM authors a, category c
           WHERE a.author_name = '$_POST[author_name]'
             AND c.category_name = '$_POST[category]'
             AND NOT EXISTS (
                 SELECT 1 FROM books b
                 WHERE b.book_name = '$_POST[book_name]'
             )
           LIMIT 1;";


    // $query4 = "UPDATE books SET category_id = (SELECT category_id FROM category WHERE category_name = '$_POST[category]')";
    // $query5 = "UPDATE books SET author_id = (SELECT author_id FROM authors WHERE author_name = '$_POST[author_name]')";

    $query_run1 = mysqli_query($connection, $query1);
    $query_run2 = mysqli_query($connection, $query2);
    $query_run3 = mysqli_query($connection, $query3);
    // $query_run4 = mysqli_query($connection, $query4);
    // $query_run5 = mysqli_query($connection, $query5);
    echo "<script>alert('added book')</script>";
}
?>

