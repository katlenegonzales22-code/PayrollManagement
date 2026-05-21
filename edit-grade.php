<?php
session_start();
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM grade WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $gradeName = $row['grade'];
        $salary = $row['salary'];
    } else {
        // Handle case where grade is not found
        header("Location: view-grade.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newGrade = $_POST['grade_name'];
    $newSalary = $_POST['salary'];

    // Update grade in the database
    $sql = "UPDATE grade SET grade = ?, salary = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $newGrade, $newSalary, $id);
    if ($stmt->execute()) {
        header("Location: view-grade.php");  // Redirect after update
        exit();
    } else {
        echo "Error updating grade.";
    }
}
?>

<title>Edit Grade</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;"><br>

        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-layer-group"></i> Edit Grade</b></h5>
        </header>

        <form method="post" action="">
            <div class="w3-container w3-padding-16">
                <label for="grade_name">Grade Name</label>
                <input class="w3-input w3-border" type="text" id="grade_name" name="grade_name" value="<?php echo htmlspecialchars($gradeName); ?>" required>
            </div>
            <div class="w3-container w3-padding-16">
                <label for="salary">Salary</label>
                <input class="w3-input w3-border" type="number" id="salary" name="salary" value="<?php echo htmlspecialchars($salary); ?>" required>
            </div>
            <div class="w3-container w3-padding-16">
                <button type="submit" class="w3-button w3-blue">Save Changes</button>
            </div>
        </form>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>