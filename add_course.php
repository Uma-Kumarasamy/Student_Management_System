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

if(isset($_POST['add_course']))
{
    $coursename=$_POST['coursename'];
    $duration=$_POST['duration'];
    $mode=$_POST['mode'];

    $sql="insert into course(coursename, duration, mode) values ('$coursename', '$duration', '$mode') ";

    $result=mysqli_query($conn, $sql);
    
    if($result)
    {
        echo "<script 'type=text/javascript'>alert('Course Added Successfully') </script>";
    }
    else
    {
        echo "Upload Failed";
    }
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
    <style>
        label{
            display:inline-block;
            text-align:right;
            width:100px;
            padding-top: 10px;
            padding-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        form {
            display: flex;
            flex-direction: column;
            
        }
        .style_input{
            border-radius: 5px;
            box-sizing: border-box;
            border: 1px solid #d62828;
            margin-bottom: 20px;
            height:35px;
            width:60%;
            margin-left:10px
        }
        .container{
            width:30%;
            
            align-items: center;
            margin-right: 27%;
            margin-top:3%;
        }
        .radio-group {
            display: flex;
            align-items: center;
        }
        .radio-group label {
            margin-right: 10px;
        }
    </style>

</head>
<body>
    
    <?php
    include 'admin_sidebar.php';
    ?>
    <center>
    <div class="content">
    <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">A</span>dd <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">C</span>ourses</h2>

    </div>
    <div class="container">
        <form action="#" method="post" style="margin-top: 5%;">
            <div>
                <label>Course Name</label>
                <input class="style_input" type="text" name="coursename">
            </div>
            <div>
            <label for="duration">Duration:</label>
            <select id="duration" name="duration" class="style_input">
                <option value="1 month">1 Month</option>
                <option value="2 months">2 Months</option>
                <option value="3 months">3 Months</option>
                <option value="4 months">4 Months</option>
                <option value="5 months">5 Months</option>
                <option value="6 months">6 Months</option>
                <option value="7 months">7 Months</option>
                <option value="8 months">8 Months</option>
                <option value="9 months">9 Months</option>
                <option value="10 months">10 Months</option>
                <option value="11 months">11 Months</option>
                <option value="12 months">12 Months</option>
            </select>
            <div class="radio-group">
            <label>Mode</label><br>
            <label for="offline">Offline</label><br>
            <input type="radio" id="offline" name="mode" value="Offline">
            <label for="online">Online</label>
            <input type="radio" id="online" name="mode" value="Online"><br>
            </div><br>
            
            
            <div>
                <input type="submit" class="btn btn-primary" name="add_course" value="Add Course">
            </div>
        </form>
    </div>
    </center>

</body>
</html>