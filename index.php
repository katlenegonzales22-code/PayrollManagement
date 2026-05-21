<?php
session_start();
include('db.php');
if($_POST)
{
    $username= $_POST["username"];
    $password= $_POST["password"];
    $sql = "SELECT *FROM admin WHERE username LIKE '$username' AND password LIKE '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["user"] = true;
        header("Location:dashboard.php");
    } else{
    ?>
    <script>alert("Username or Password Wrong !!!");</script>
    <?php
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css" />
	<style>
	body { 
     background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(image/pic1.jpg);
     height: 100vh;
     background-size: cover;
     background-position: center;
	}	
	</style>
</head>
<body class="">
    <div class="box w3-white w3-card w3-padding">
        <form action="" method="post">
        <span class="w3-large">Login</span>
        <p></p>
        <input type="text" required class="w3-input" placeholder="Username" name="username">
        <p></p>
        <input type="password" required class="w3-input" placeholder="Password" name="password">
        <p></p>
        <button class="w3-btn w3-blue" type="submit">Login</button>
        </from>
    </div>    
</body>
</html>