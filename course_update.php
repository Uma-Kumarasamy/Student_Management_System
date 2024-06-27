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

$id=$_GET['course_id']; // coming from view_student.php update option

$sql="select * from course where id='$id' ";

$result=mysqli_query($conn, $sql);

$info=mysqli_fetch_assoc($result);


// updating the data
if(isset($_POST['update']))
{
    $coursename=$_POST['coursename'];
    $duration=$_POST['duration'];
    $mode=$_POST['mode'];
      

    $query="update course SET coursename='$coursename', duration='$duration', mode='$mode' where id=$id ";

    $result2=mysqli_query($conn, $query);
    if($result2)
    {
        echo "<script type='text/javascript'>alert('Updated'); window.location.href='view_course.php';</script>";
        exit();
        
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

</head>
<body>
    
    <?php
    include 'admin_sidebar.php';
    ?>
    <style>
        label{
            display:inline-block;
            text-align:right;
            width:100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
    <center>
    <div class="content">
    <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">U</span>pdate <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">C</span>ourse</h2>
    
    <div>
        <form action="#" method="post">
            <div>
                <label>Course Name</label>
                <input type="text" name="coursename" value="<?php echo "{$info['coursename']}"?>">
            </div>
            <div>
                <label>Duration</label>
                <input type="text" name="duration" value="<?php echo "{$info['duration']}" ?>">
            </div>
            <div>
                <label>Mode</label>
                <input type="text" name="mode" value="<?php echo "{$info['mode']}" ?>">
            </div>
            
            <div>
                <input type="submit" class="btn btn-primary" name="update" value="Update">
            </div>
        </form>
    </div>
    </div>
    </center>
</body>
</html>