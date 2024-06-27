<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body background="classroom.jpg" class="body_deg">
    <center>
        
        <div class="form_deg">
            <center class="title_deg">
            
                <h4>
                    <?php
                    error_reporting(0);  // it hide the error if you remove this you can see the error
                    session_start(); // it show the message it is related to check.php else statement session_start
                    session_destroy();
                    echo '<p style="color: #d62828;">' . $_SESSION['loginMessage'] . '</p>';
                    ?>
                </h4>
                <h2><span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">W</span>elcome <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">t</span>o <span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">M</span>ini-<span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">T</span>ech-<span style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #d62828;">I</span>nstitute</h2>

            </center>
            <form action="check.php" method="post" class="login_form" style="padding-top:1%;"> 
                <div>
                    <label class="label_deg">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label_deg">Password</label>
                    <input type="Password" name="password">
                </div>
                <div>
                <input type="submit" class="btn btn-danger" value="Login" id="log">

                </div>
            </form>
        </div>
        
    </center>
</body>
</html>