<?php
    require('functions.php');
	session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $query = "update books set book_copies = book_copies+1 where isbn = $_GET[isbn];";
    mysqli_query($connection, $query);
    header('location:manage_book.php');
?>

