<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = trim($_POST["department"]);

    if (!empty($department)) {
        // Check if department already exists
        $check_stmt = $conn->prepare("SELECT id FROM department WHERE name = ?");
        $check_stmt->bind_param("s", $department);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            echo "<script>alert('This department already exists.');</script>";
        } else {
            // Use prepared statement to insert department
            $stmt = $conn->prepare("INSERT INTO department (name) VALUES (?)");
            $stmt->bind_param("s", $department);

            if ($stmt->execute()) {
                header("Location: view-department.php");
                exit();
            } else {
                echo "<script>alert('Oops! Something went wrong.');</script>";
            }

            $stmt->close();
        }

        $check_stmt->close();
    } else {
        echo "<script>alert('Department name cannot be empty.');</script>";
    }
}
?>

<title>Add Department</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>
    
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;"><br>

        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-building"></i> Add Department</b></h5>
        </header>

        <div class="box w3-white w3-card w3-padding">
            <form action="" method="post">
                <p></p>
                <input type="text" required class="w3-input" placeholder="Department Name" name="department">
                <p></p>
                <button class="w3-btn w3-blue" type="submit">Add Department</button>
            </form>
        </div>
        
    </div>
    <script src="js/openclosemenu.js"></script>
</body>