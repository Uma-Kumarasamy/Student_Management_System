<?php
session_start();
// Check if the username is not set in the session, redirect to login page
if(!isset($_SESSION['username'])) {    
    header("location:login.php");
    exit(); // Ensure no further code is executed
}
elseif($_SESSION['usertype']=='admin'){
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <?php
    include('student_css.php');
    ?>
</head>
<body>
    <?php
    include('student_sidebar.php');
?>
</body>
</html>
    
</body>
</html>