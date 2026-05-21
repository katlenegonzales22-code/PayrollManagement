<?php
session_start();
include('db.php');

if($_POST)
{
    $grade = $_POST["grade"];
    $salary = $_POST["salary"];
    $sql = "INSERT INTO grade (grade, salary) VALUES ('$grade', '$salary')";
    if ($conn->query($sql) === TRUE) {
        header("Location:view-grade.php");
    } else {
        ?>
        <script>alert("Opps Something went wrong !!!");</script>
        <?php
    }

}
?>

<title>Add Grade</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;"><br>
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-layer-group"></i> Add Grade</b></h5>
        </header>
        <div class="box w3-white w3-card w3-padding">
            <form action="" method="post">
                <p></p>
                <input type="text" required class="w3-input" placeholder="Grade Name" name="grade">
                <p></p>
                <input type="number" required class="w3-input" placeholder="Salary" name="salary">
                <p></p>
                <button class="w3-btn w3-blue" type="submit">Add Grade</button>
            </from>
        </div>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>