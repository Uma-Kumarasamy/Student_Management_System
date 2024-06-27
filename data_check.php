<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "schoolproject");

if ($conn === false) {
    die("connection error");
}

if (isset($_POST['apply'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        $sql = "INSERT INTO admission (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Your application was sent successfully";
        } else {
            $_SESSION['message'] = "There was an error in sending your application";
        }
    } else {
        $_SESSION['message'] = "Please fill in all fields";
    }

    header("location:index.php");
    exit();
}
?>
