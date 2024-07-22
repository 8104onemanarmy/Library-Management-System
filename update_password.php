<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
$db = mysqli_select_db($connection, 'lms_main');

$actual_password = "";
$query = "SELECT * FROM users WHERE email = '{$_SESSION['email']}'";
$query_run = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_run)) {
    $actual_password = $row['password'];
    if ($actual_password == $_POST['curr_passwd'] && $_POST['new_passwd'] == $_POST['confirm_passwd']) {
        $new_password = $_POST['new_passwd'];
        $update_query = "UPDATE users SET password = '$new_password' WHERE email = '{$_SESSION['email']}'";
        $update_query_run = mysqli_query($connection, $update_query);
        
        if ($update_query_run) {
            echo "<script>alert('Password changed successfully');</script>";
            echo "<script>window.location.href = 'user_dashboard.php';</script>";
        }
    }
    else {
        echo "<script>alert('Passwords Not Matching / Incorrect Password Entered');</script>";
        echo "<script>window.location.href = 'change_password.php';</script>";
    }
}
?>
