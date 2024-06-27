<?php
session_start();
$conn=mysqli_connect("localhost", "root", "", "schoolproject");

if($_GET['student_id'])
{
    $user_id=$_GET['student_id'];

    $sql="Delete from user where id='$user_id' ";

    $result=mysqli_query($conn, $sql);

    if($result)
    {

        header("location: view_student.php");
        
    }
}
?>