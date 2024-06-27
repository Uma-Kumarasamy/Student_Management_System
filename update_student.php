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

$id=$_GET['student_id']; // coming from view_student.php update option

$sql="select * from user where id='$id' ";

$result=mysqli_query($conn, $sql);

$info=mysqli_fetch_assoc($result);


// updating the data
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];   

    $query="update user SET username='$name', email='$email', phone='$phone', password='$password' where id=$id ";

    $result2=mysqli_query($conn, $query);
    if($result2)
    {
        echo "<script type='text/javascript'>alert('Updated'); window.location.href='view_student.php';</script>";
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
    <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">U</span>pdate <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">S</span>tudent</h2>
    
    <div>
        <form action="#" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="name" value="<?php echo "{$info['username']}"?>">
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo "{$info['email']}" ?>">
            </div>
            <div>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo "{$info['phone']}" ?>">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password" value="<?php echo "{$info['password']}"?>">
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