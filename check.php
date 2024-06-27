<?php

error_reporting(0);  //not show error like password not match or user not match like that
session_start(); //this will show the message, istead of putting session_start in between line 30, 43 we put commonly at the top


// Create connection
$conn = mysqli_connect("localhost", "root", "", "schoolproject");

// Check connection
if ($conn===false) {
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST") //when login button click if the method is  post
{
    $name=$_POST["username"];
    $pass=$_POST["password"];

    $sql="select * from user where username='".$name."' AND password='".$pass."'  ";

    $result=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($result);

    if($row)
    {
        if($row["usertype"]=="student"){
            // if i enter studenthome.php by manually it redirect to that without login, so below code help to avoid that 
            $_SESSION['username']=$name;

            // from admin page it can go to student or from student page it can go admin by manually, so below code help to avoid that 
            $_SESSION['usertype']="student";

            
            header("location:studenthome.php");
        }
        elseif($row["usertype"]=="admin"){
            // if i enter adminhome.php by manually it redirect to that without login, so below code help to avoid that 
            $_SESSION['username']=$name;

            // from admin page it can go to student or from student page it can go admin by manually, so below code help to avoid that 
            $_SESSION['usertype']="admin";


            header("location:adminhome.php");
        }
        else{
            echo "Invalid Usertype";
        }
    }   
    else {
        
        $message= "Username or password do not match.";

        $_SESSION['loginMessage']=$message; // By storing the message in a session variable, you can access it on a different page (in this case, login.php).
        
        header("location:login.php");
    } 

}


?>

