<?php

session_start();
$conn=mysqli_connect("localhost", "root", "", "schoolproject");

if($_GET['course_id'])
{
    $id=$_GET["course_id"];
    $sql="Delete from course where id='$id' ";
    $result=mysqli_query($conn, $sql);

    if($result)
    {
        header("location: view_course.php");
    }

}
?>