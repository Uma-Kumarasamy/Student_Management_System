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

if(isset($_POST['add_student']))
{
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $usertype="student";

// check whether same username login or not, only username should be unique
$check="select * from user where username='$username'";
$check_user=mysqli_query($conn, $check);
$row_count=mysqli_num_rows($check_user);
if($row_count==1)
{
    echo "<script type='text/javascript'> alert('Username Already Exist. Try Another One') </script>";
}

else{
    $sql="insert into user(username, phone, email, usertype, password) values('$username', '$user_phone', '$user_email', '$usertype', '$user_password')";

    $result=mysqli_query($conn, $sql);

    if($result)
    {
        echo "<script type='text/javascript'> alert('Data Uploaded Successfully') </script>";
    }
    else
    {
        echo "Upload Failed";
    }
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
    </style>

</head>
<body>
    
    <?php
    include 'admin_sidebar.php';
    ?>
    <center>
    <div class="content">
    <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">A</span>dd <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">S</span>tudent</h2>

    </div>
    <div class="container">
        <form action="#" method="post" style="margin-top: 5%;">
            <div>
                <label>Username</label>
                <input class="style_input" type="text" name="name">
            </div>
            <div>
                <label>Email</label>
                <input class="style_input" type="email" name="email">
            </div>
            <div>
                <label>Phone</label>
                <input class="style_input" type="number" name="phone">
            </div>
            <div>
                <label>Password</label>
                <input class="style_input" type="text" name="password">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
            </div>
        </form>
    </div>
    </center>

</body>
</html>