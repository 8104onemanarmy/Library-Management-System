<?php
    require('functions.php');
	session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $query = "update books set book_copies = book_copies-1 where isbn = $_GET[isbn];";
    $query2 = "delete from books where book_copies = 0;";
    mysqli_query($connection, $query);
    mysqli_query($connection, $query2);
    header('location:manage_book.php');
?>

