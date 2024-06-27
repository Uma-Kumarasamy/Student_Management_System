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

$conn=mysqli_connect("localhost", "root", "", "schoolproject");

$name=$_SESSION['username'];

$sql="select * from user where username='$name' ";

$result=mysqli_query($conn, $sql);

$info=mysqli_fetch_assoc($result);

//update 
if(isset($_POST['update']))
{
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    
    $sql2="update user SET email='$email', phone='$phone', password='$password' where username='$name' ";

    $result2=mysqli_query($conn, $sql2);

    if($result2)
    {
        echo "<script 'type=text/javascript'>alert('Update Successfully');
        
         </script>";
        
    }
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
        <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">U</span>pdate <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">P</span>rofile</h2>

        <form action="#" method="post">
            <!-- delete name label because name is unique, so no need to update that -->
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo "{$info['email']}"  ?>">
            </div>
            <div>
                <label>Phone</label>
                <input type="number" name="phone" value="<?php echo "{$info['phone']}"  ?>">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo "{$info['password']}"  ?>">
            </div>
            <div>
                
                <input type="submit" name="update" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
    </center>



</body>
</html>
    
</body>
</html>