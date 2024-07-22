<?php
    session_start();

    if(isset($_POST['login'])){
        $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
        $db =mysqli_select_db($connection, 'lms_main');
        $email = $_POST['email'];
        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $query_run = mysqli_query($connection, $query);
        //if either of email or passwd is wrong then message is that either of them is required
        //whether email is wrong or password is wrong is not mentioned due to security reasons
        while($row=mysqli_fetch_assoc($query_run))
        {
            if($row['email']==$_POST['email'] && $row['password']==$_POST['password'])
            {
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header('Location: user_dashboard.php');
                exit();
            } 
            else
            {
                $_SESSION['login_error'] = "Invalid Email/Password!"; //this is to print error message on index.php itself
                header('Location: index.php');
                exit();
            }
        }
    }
?>