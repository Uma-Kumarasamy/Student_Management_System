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

$conn=mysqli_connect("localhost", "root", "", "schoolproject");

$sql="Select * from admission";
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
    
    <div class="content">
        <center>
        <h2 style="margin-bottom:30px;"><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">A</span>pplied <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">F</span>or <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">A</span>dmission</h2>

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
        
        <table border="1px">
            <tr style="text-align: center; color:#c83126; font-weight: bold;">
                <th style="padding: 20px; font-size:15px;">Name</th>
                <th style="padding: 20px; font-size:15px;">Email</th>
                <th style="padding: 20px; font-size:15px;">Phone</th>
                <th style="padding: 20px; font-size:15px;">Message</th>
            </tr>

            <?php
            while($info=mysqli_fetch_assoc($result))
            {
            ?>
            <tr style="text-align: center; color:#1f5776; font-weight:bold;">
                <td style="padding: 20px;">
                    <?php echo $info['name']; ?>
                </td>
                <td style="padding: 20px;">
                    <?php echo "{$info['email']}"; ?>
                </td>
                <td style="padding: 20px;">
                    <?php echo "{$info['phone']}"; ?>
                </td>
                <td style="padding: 20px;">
                    <?php echo "{$info['message']}"; ?>
                </td>
            </tr>
            <?php
                
            }
            ?>
            
            
        </table>

        </center>
    </div>
</body>
</html>