<?php
  require('functions.php');
	session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main');
    $isbn=""; $book_name=""; $author_name=""; $category=""; $copies=""; $price="";
    $query = "select books.isbn as isbn, books.book_name as book_name, authors.author_name as author_name, category.category_name as category, books.book_copies as copies, books.book_price 
                as price from books left join authors on books.author_id = authors.author_id
                left join category on books.category_id = category.category_id;";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <title>Books</title>
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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="900px" style="text-align: center;">
                    <tr>
                        <th>ISBN</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>No. of copies</th>
                        <th>Price</th>
                    </tr>
                    <?php
                        $query_run = mysqli_query($connection, $query);
                        while($row=mysqli_fetch_assoc($query_run))
                        {
                            $isbn=$row['isbn'];
                            $book_name=$row['book_name'];
                            $author_name=$row['author_name']; 
                            $category=$row['category']; 
                            $copies=$row['copies']; 
                            $price=$row['price'];
                            echo "<tr><td>$isbn</td><td>$book_name</td><td>$author_name</td><td>$category</td><td>$copies</td><td>$price</td></tr>";
                        }
                    ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>