<?php
session_start();
// if i enter studenthome.php by manually it redirect to that without login, so below code help to avoid that 
//this code help to check whehter username is not set it redirect to login.php page

if(!isset($_SESSION['username']))    
{
    header("location:login.php");
    exit();
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
    include 'admin_css.php';
    ?>

</head>
<body>
    
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
    <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">A</span>dmission <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">D</span>ashboard</h2>

    </div>
</body>
</html>