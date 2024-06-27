<?php
session_start();
error_reporting(0);

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

$conn=mysqli_connect("localhost", "root", "", "schoolproject");
$sql="select * from course";
$result=mysqli_query($conn, $sql);
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
    <style>
            table{
                border-top:3px solid #c83126; 
                border-bottom: 3px solid #c83126;
                border-right: 3px solid #1f5776;
                border-left: 3px solid #1f5776;
                text-align: center;
                font-size: 1.0em; 
            }
        </style>
    <center>
    <div class="content">
    <h2 style="margin-bottom: 30px"><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">C</span>ourse <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">L</span>ists</h2>
        
    <table border="1px">
            <tr style="text-align: center; color:#c83126; font-weight: bold;">
                <th style="padding: 20px; font-size:15px;">Course Name</th>
                <th style="padding: 20px; font-size:15px;">Duration</th>
                <th style="padding: 20px; font-size:15px;">Mode</th>
                <th style="padding: 20px; font-size:15px;">Delete</th>
                <th style="padding: 20px; font-size:15px;">Update</th>
            </tr>

            <?php 
            while($info=mysqli_fetch_assoc($result))
            {
            ?>
            <tr style="text-align: center; color:#1f5776; font-weight:bold;">

                <td style="padding: 20px;">
                    <?php echo $info['coursename']; ?>
                </td>
                <td style="padding: 20px;">
                    <?php echo $info['duration']; ?>
                </td>
                <td style="padding: 20px;">
                    <?php echo $info['mode']; ?>
                </td>
                <td style="padding: 20px;">
                <?php echo "<a class='btn btn-danger' onclick=\" javascript:return confirm('Are You Sure to Delete This');\" href='delete_course.php?course_id={$info['id']}'>Delete</a>";?> <!-- student_id is variable -->
                </td>
                <td style="padding: 20px;">
                    <?php echo "<a class='btn btn-primary' href='course_update.php?course_id={$info['id']}'>Update</a>"; ?>
                </td>
            </tr>
            <?php
            }
            ?>