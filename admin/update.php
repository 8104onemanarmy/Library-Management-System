<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
$db = mysqli_select_db($connection, 'lms_main');

$query = "SELECT * FROM admins WHERE email = '{$_SESSION['email']}'";
$query_run = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_run)) { 
        $update_query3 = "UPDATE admins SET email = '{$_POST['email']}' WHERE email = '{$_SESSION['email']}'";
        $update_query2 = "UPDATE admins SET name = '{$_POST['name']}' WHERE email = '{$_SESSION['email']}'";
        $update_query1 = "UPDATE admins SET mobile = '{$_POST['mobile']}' WHERE email = '{$_SESSION['email']}'";

        $update_query_run1 = mysqli_query($connection, $update_query1);
        $update_query_run2 = mysqli_query($connection, $update_query2);
        $update_query_run3 = mysqli_query($connection, $update_query3);
        
        if ($update_query_run1 && $update_query_run2 && $update_query_run3) {
            echo "<script>alert('Details Updated successfully');</script>";
            echo "<script>window.location.href = 'admin_dashboard.php';</script>";
        }
    
    else {
        echo "<script>alert('Could not update details');</script>";
        echo "<script>window.location.href = 'edit_profile.php';</script>";
    }
}
?>
