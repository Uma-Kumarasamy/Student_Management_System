<?php
session_start();
error_reporting(0);

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
        alert('$message');
    </script>";
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<h1>, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <nav>
        <label class="logo">Mini-Tech-Institute</label>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#admission">Admission</a></li>
            <li><a href="login.php"><button class="btn btn-success">Login</button></a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">We Teach Students With Care</label>
        <img class="main_img" src="classroom.jpg">
    </div>
    <div class="container1">
        <div class="row">
            <div class="col-md-4">
                <img src="school2.jpg" class="welcome_img">
            </div>
            <div class="col-md-8">
                <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">W</span>elcome <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">t</span>o <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">M</span>ini-<span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">T</span>ech-<span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">I</span>nstitute</h2>
                <p>Welcome to Mini-Tech-Institute, where dedication meets innovation in education. Since our establishment in 2012, we have been committed to equipping students with the skills they need for the modern world. At Mini-Tech-School, we offer top-notch instruction in web development, marketing, and graphic design. Our experienced and passionate educators provide personalized attention, ensuring each student's unique potential is recognized and cultivated. We believe in creating a safe and stimulating environment where every student can thrive academically, socially, and creatively. Join the Mini-Tech-School family and be part of a community that values integrity, respect, and the joy of learning. Together, we build a brighter future, one student at a time.</p>

            </div>
        </div>
    </div><br>
    <center>
        <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">O</span>ur <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">T</span>eachers</h2>
    </center>
    <div class="container2" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" style="width: 90%; height: 200px;" src="teacher3.jpg">   
                <p>Teachers have the unique ability to see the potential in every student and help them to realize their own strengths. </p>
                </div>
            <div class="col-md-4">
                <img class="teacher" style="width: 90%; height: 200px;" src="teacher1.jpg">   
                <p>Teachers create a nurturing environment where students feel safe, valued, and encouraged to explore their interests and challenge their limits.</p>
            </div>
            <div class="col-md-4">
                <img class="teacher" style="width: 90%; height: 200px;" src="teacher2.jpg">
                <p>A great teacher does not just teach; they inspire and motivate the students. Teachers are the anchors of stability and the champions of progress.</p>
            </div>

        </div>
    </div><br>
    <center>
        <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">O</span>ur <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">C</span>ourses</h2>
    </center>
    <div class="container3">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" style="width: 90%; height: 200px;" src="web.jpg">
                <h4 style="color: #d62828; margin-left:20%; margin-top:10px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);font-weight: bold;">Web Developer</h4>
            </div>
            <div class="col-md-4">
                <img class="teacher" style="width: 90%; height: 200px;" src="graphic2.jpg">   
                <h4 style="color: #d62828; margin-left:20%; margin-top:10px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);font-weight: bold;">Graphic Design</h4>
            </div>
            <div class="col-md-4">
                <img class="teacher" style="width: 90%; height: 200px;" src="marketing.jpg">
                <h4 style="color: #d62828; margin-left:30%; margin-top:10px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);font-weight: bold;">Marketing</h4>
            </div>

        </div>
    </div>
    <center>
        <h2 style="margin-top: 20px; margin-bottom:30px; margin-left:7%; font-size:35px;"><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">A</span>dmission <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">F</span>orm</h2>
   

    <div class="admission_form" id="admission">
        <form action="data_check.php" method="post">
            <div>
                <label class="labelname">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div>
                <label class="labelname">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div>
                <label class="labelname">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div>
                <label class="labelname">Message</label>
                <textarea class="input_text" name="message"></textarea>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" id="submit" value="Apply" name="apply">
            </div>
            
        </form>
    </div>
    </center><br>
    <footer>
        <h3 class="footer_txt">Copyright@ 2024 Uma All rights reserved</h3>
    </footer>
</body>
</html>