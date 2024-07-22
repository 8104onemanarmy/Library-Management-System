<?php
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $db =mysqli_select_db($connection, 'lms_main');
    //attributes of table users are (id, name, email, password, mobile no) where id is auto increment
    $query = "INSERT INTO `users` VALUES (NULL, '$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[mobile]')";
    $query_run = mysqli_query($connection, $query);
?>
<script type="text/javascript">
    alert("Registered Successfully!.....You may login now.")
    window.location.href = 'index.php';
</script>